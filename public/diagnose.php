<?php
/**
 * Laravel Deployment Diagnostic Script
 * Access via: https://publisher.softspace.ae/diagnose.php
 * DELETE THIS FILE after debugging!
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<html><head><title>Deployment Diagnostics</title>";
echo "<style>body{font-family:monospace;background:#1a1a2e;color:#e0e0e0;padding:20px;max-width:900px;margin:0 auto}";
echo "h1{color:#00d4ff}h2{color:#ffa500;border-bottom:1px solid #333;padding-bottom:5px;margin-top:30px}";
echo ".ok{color:#00ff88}.fail{color:#ff4444}.warn{color:#ffaa00}pre{background:#0d0d1a;padding:10px;border-radius:5px;overflow-x:auto;border:1px solid #333}";
echo "table{width:100%;border-collapse:collapse}td,th{padding:6px 10px;text-align:left;border-bottom:1px solid #222}th{color:#00d4ff}</style></head><body>";
echo "<h1>🔍 Laravel Deployment Diagnostics</h1>";
echo "<p>Server Time: " . date('Y-m-d H:i:s T') . "</p>";

$basePath = realpath(__DIR__ . '/..');

// ============================================================
// 1. PHP VERSION
// ============================================================
echo "<h2>1. PHP Version</h2>";
$phpVersion = phpversion();
if (version_compare($phpVersion, '8.2.0', '>=')) {
    echo "<p class='ok'>✅ PHP $phpVersion (8.2+ required)</p>";
} else {
    echo "<p class='fail'>❌ PHP $phpVersion — Laravel 11 requires PHP 8.2+. Change this in cPanel → MultiPHP Manager.</p>";
}

// ============================================================
// 2. REQUIRED PHP EXTENSIONS
// ============================================================
echo "<h2>2. PHP Extensions</h2>";
$required = ['bcmath','ctype','curl','dom','fileinfo','json','mbstring','openssl','pdo','pdo_mysql','tokenizer','xml','gd'];
echo "<table><tr><th>Extension</th><th>Status</th></tr>";
foreach ($required as $ext) {
    $loaded = extension_loaded($ext);
    $status = $loaded ? "<span class='ok'>✅ Loaded</span>" : "<span class='fail'>❌ MISSING</span>";
    echo "<tr><td>$ext</td><td>$status</td></tr>";
}
echo "</table>";

// ============================================================
// 3. VENDOR DIRECTORY
// ============================================================
echo "<h2>3. Vendor Directory (Composer)</h2>";
$vendorAutoload = $basePath . '/vendor/autoload.php';
if (file_exists($vendorAutoload)) {
    echo "<p class='ok'>✅ vendor/autoload.php exists</p>";
} else {
    echo "<p class='fail'>❌ vendor/autoload.php NOT FOUND — You must run: <code>composer install</code> on the server via SSH or Terminal.</p>";
    echo "<p class='fail'>This is almost certainly the cause of your 500 error.</p>";
}

// ============================================================
// 4. .ENV FILE
// ============================================================
echo "<h2>4. .env File</h2>";
$envPath = $basePath . '/.env';
if (file_exists($envPath)) {
    echo "<p class='ok'>✅ .env file exists</p>";
    
    $envContent = file_get_contents($envPath);
    $lines = explode("\n", $envContent);
    $envVars = [];
    foreach ($lines as $line) {
        $line = trim($line);
        if (empty($line) || strpos($line, '#') === 0) continue;
        $eqPos = strpos($line, '=');
        if ($eqPos === false) continue;
        $key = trim(substr($line, 0, $eqPos));
        $value = trim(substr($line, $eqPos + 1));
        $envVars[$key] = $value;
    }
    
    // Check critical keys
    $checks = [
        'APP_KEY' => 'Must start with base64: — run php artisan key:generate if missing',
        'APP_URL' => 'Must match your domain',
        'APP_INSTALLED' => 'Must be true',
        'DB_DATABASE' => 'Database name',
        'DB_USERNAME' => 'Database user',
        'DB_PASSWORD' => 'Database password (check special chars are quoted)',
        'DB_HOST' => 'Usually localhost on cPanel',
    ];
    
    echo "<table><tr><th>Key</th><th>Value</th><th>Status</th></tr>";
    foreach ($checks as $key => $hint) {
        $val = $envVars[$key] ?? '<NOT SET>';
        $display = $key === 'DB_PASSWORD' ? str_repeat('*', min(strlen($val), 8)) : htmlspecialchars($val);
        $ok = !empty($envVars[$key]);
        $status = $ok ? "<span class='ok'>✅</span>" : "<span class='fail'>❌ $hint</span>";
        echo "<tr><td>$key</td><td>$display</td><td>$status</td></tr>";
    }
    echo "</table>";
    
    // Special check for DB_PASSWORD with unquoted special chars
    $rawPassword = $envVars['DB_PASSWORD'] ?? '';
    if (preg_match('/[\\$\\&\\!\\#\\(\\)]/', $rawPassword) && $rawPassword[0] !== '"') {
        echo "<p class='fail'>⚠️ DB_PASSWORD contains special characters but is NOT wrapped in double quotes. This WILL cause a parse error. Fix: <code>DB_PASSWORD=\"your_password\"</code></p>";
    }
    
} else {
    echo "<p class='fail'>❌ .env file NOT FOUND at: $envPath</p>";
    echo "<p>You need to create a .env file in the project root (not in public/).</p>";
}

// ============================================================
// 5. DIRECTORY PERMISSIONS
// ============================================================
echo "<h2>5. Directory Permissions</h2>";
$dirs = [
    'storage' => $basePath . '/storage',
    'storage/framework' => $basePath . '/storage/framework',
    'storage/framework/cache' => $basePath . '/storage/framework/cache',
    'storage/framework/sessions' => $basePath . '/storage/framework/sessions',
    'storage/framework/views' => $basePath . '/storage/framework/views',
    'storage/logs' => $basePath . '/storage/logs',
    'bootstrap/cache' => $basePath . '/bootstrap/cache',
];

echo "<table><tr><th>Directory</th><th>Exists</th><th>Writable</th><th>Perms</th></tr>";
foreach ($dirs as $name => $path) {
    $exists = is_dir($path);
    $writable = $exists ? is_writable($path) : false;
    $perms = $exists ? substr(sprintf('%o', fileperms($path)), -4) : 'N/A';
    
    $existsStr = $exists ? "<span class='ok'>✅</span>" : "<span class='fail'>❌</span>";
    $writableStr = $writable ? "<span class='ok'>✅</span>" : "<span class='fail'>❌ NOT WRITABLE</span>";
    
    echo "<tr><td>$name</td><td>$existsStr</td><td>$writableStr</td><td>$perms</td></tr>";
}
echo "</table>";

// ============================================================
// 6. DATABASE CONNECTION
// ============================================================
echo "<h2>6. Database Connection</h2>";
$dbHost = $envVars['DB_HOST'] ?? 'localhost';
$dbPort = $envVars['DB_PORT'] ?? '3306';
$dbName = $envVars['DB_DATABASE'] ?? '';
$dbUser = $envVars['DB_USERNAME'] ?? '';
$dbPass = $envVars['DB_PASSWORD'] ?? '';
// Remove surrounding quotes from password if present
$dbPass = trim($dbPass, '"\'');

if (empty($dbName) || empty($dbUser)) {
    echo "<p class='fail'>❌ DB_DATABASE or DB_USERNAME not set in .env</p>";
} else {
    try {
        $dsn = "mysql:host=$dbHost;port=$dbPort;dbname=$dbName;charset=utf8mb4";
        $pdo = new PDO($dsn, $dbUser, $dbPass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_TIMEOUT => 5,
        ]);
        echo "<p class='ok'>✅ Database connection successful to: $dbName@$dbHost</p>";
        
        // Check if tables exist
        $tables = $pdo->query("SHOW TABLES")->fetchAll(PDO::FETCH_COLUMN);
        $tableCount = count($tables);
        echo "<p class='ok'>✅ Found $tableCount tables in database</p>";
        if ($tableCount === 0) {
            echo "<p class='warn'>⚠️ Database is empty. You may need to run migrations: <code>php artisan migrate</code></p>";
        }
    } catch (PDOException $e) {
        echo "<p class='fail'>❌ Database connection FAILED: " . htmlspecialchars($e->getMessage()) . "</p>";
        echo "<p>Check: cPanel → MySQL Databases → ensure user <b>$dbUser</b> is assigned to database <b>$dbName</b> with all privileges.</p>";
    }
}

// ============================================================
// 7. DOCUMENT ROOT CHECK
// ============================================================
echo "<h2>7. Document Root</h2>";
$docRoot = $_SERVER['DOCUMENT_ROOT'] ?? 'unknown';
echo "<p>Document Root: <code>$docRoot</code></p>";
$scriptFilename = $_SERVER['SCRIPT_FILENAME'] ?? '';
echo "<p>Script Path: <code>$scriptFilename</code></p>";
if (strpos($docRoot, 'public') !== false || strpos($docRoot, 'public_html') !== false) {
    echo "<p class='ok'>✅ Document root appears to include 'public'</p>";
} else {
    echo "<p class='warn'>⚠️ Document root may not point to the /public directory. For Laravel, the domain must serve from the /public folder.</p>";
}

// ============================================================
// 8. KEY FILES CHECK
// ============================================================
echo "<h2>8. Key Files</h2>";
$files = [
    'bootstrap/app.php' => $basePath . '/bootstrap/app.php',
    'artisan' => $basePath . '/artisan',
    'composer.json' => $basePath . '/composer.json',
    'composer.lock' => $basePath . '/composer.lock',
    'public/index.php' => $basePath . '/public/index.php',
    'public/.htaccess' => $basePath . '/public/.htaccess',
    'config/app.php' => $basePath . '/config/app.php',
    'config/database.php' => $basePath . '/config/database.php',
];

echo "<table><tr><th>File</th><th>Status</th></tr>";
foreach ($files as $name => $path) {
    $exists = file_exists($path);
    $status = $exists ? "<span class='ok'>✅ Found</span>" : "<span class='fail'>❌ Missing</span>";
    echo "<tr><td>$name</td><td>$status</td></tr>";
}
echo "</table>";

// ============================================================
// 9. LARAVEL LOG (LAST 30 LINES)
// ============================================================
echo "<h2>9. Laravel Log (last 30 lines)</h2>";
$logFile = $basePath . '/storage/logs/laravel.log';
if (file_exists($logFile)) {
    $logContent = file_get_contents($logFile);
    $logLines = explode("\n", $logContent);
    $lastLines = array_slice($logLines, -30);
    echo "<pre>" . htmlspecialchars(implode("\n", $lastLines)) . "</pre>";
} else {
    echo "<p class='warn'>⚠️ No laravel.log found. Either storage/logs is not writable, or Laravel never bootstrapped.</p>";
}

// ============================================================
// 10. ATTEMPT LARAVEL BOOTSTRAP
// ============================================================
echo "<h2>10. Laravel Bootstrap Test</h2>";
if (file_exists($vendorAutoload)) {
    try {
        // Try to bootstrap
        require $vendorAutoload;
        echo "<p class='ok'>✅ Autoloader loaded successfully</p>";
        
        // Don't actually boot Laravel, just confirm autoloader works
    } catch (Throwable $e) {
        echo "<p class='fail'>❌ Autoloader error: " . htmlspecialchars($e->getMessage()) . "</p>";
        echo "<pre>" . htmlspecialchars($e->getTraceAsString()) . "</pre>";
    }
} else {
    echo "<p class='fail'>❌ Cannot test — vendor/autoload.php missing. Run <code>composer install</code> first.</p>";
}

echo "<hr><p style='color:#666;margin-top:30px'>⚠️ <b>DELETE THIS FILE</b> (diagnose.php) after debugging — it exposes sensitive server information.</p>";
echo "</body></html>";
