<p align="center">
  <img src="https://img.shields.io/badge/Framework-Laravel%2011-red?style=for-the-badge&logo=laravel" alt="Laravel 11">
  <img src="https://img.shields.io/badge/PHP-%5E8.2-blue?style=for-the-badge&logo=php" alt="PHP 8.2+">
  <img src="https://img.shields.io/badge/Frontend-Tailwind%20CSS%204-38bdf8?style=for-the-badge&logo=tailwindcss" alt="Tailwind CSS">
  <img src="https://img.shields.io/badge/Bundler-Vite%205-646cff?style=for-the-badge&logo=vite" alt="Vite 5">
  <img src="https://img.shields.io/badge/Database-MySQL-4479A1?style=for-the-badge&logo=mysql" alt="MySQL">
</p>

# Stackposts — Social Media Post Scheduler

**Stackposts** is a comprehensive, enterprise-grade **Social Media Management & Post Scheduling** platform built on **Laravel 11**. It enables users to compose, schedule, and automatically publish content across multiple social media networks — including Facebook, Instagram, LinkedIn, X (Twitter), and TikTok — from a single unified dashboard. The platform also integrates multi-provider AI content generation (OpenAI, Gemini, Claude, DeepSeek), a full payment/subscription system, team collaboration, an affiliate program, and a theming engine.

---

## Table of Contents

- [Overview](#overview)
- [Architecture](#architecture)
- [Technology Stack](#technology-stack)
- [Directory Structure](#directory-structure)
- [Core Application Layer](#core-application-layer)
- [Module System — Detailed Breakdown](#module-system--detailed-breakdown)
- [Data Flow & Processing](#data-flow--processing)
- [Operational Workflows](#operational-workflows)
- [Authentication & Authorization](#authentication--authorization)
- [Theming System](#theming-system)
- [AI Integration](#ai-integration)
- [Payment & Subscription System](#payment--subscription-system)
- [Configuration & Environment](#configuration--environment)
- [Installation & Setup](#installation--setup)
- [Development Workflow](#development-workflow)
- [File & Dependency Map](#file--dependency-map)
- [Recommendations & Improvements](#recommendations--improvements)
- [License](#license)

---

## Overview

Stackposts is a SaaS platform designed for individuals, teams, and agencies to manage their social media presence at scale. Key capabilities include:

| Feature | Description |
|---|---|
| **Multi-Platform Scheduling** | Compose once, schedule and publish to Facebook Pages/Profiles, Instagram, LinkedIn Pages/Profiles, X (Twitter), and TikTok |
| **AI Content Generation** | Generate text, images, video analysis, speech, and embeddings using OpenAI, Google Gemini, Anthropic Claude, or DeepSeek |
| **Calendar & Campaign Management** | Visual calendar view with drag-and-drop rescheduling, campaign grouping, labels, and bulk operations |
| **Team Collaboration** | Multi-team support with granular per-user permissions, team switching, and member invitations |
| **RSS Feed Automation** | Auto-import and schedule posts from RSS feeds |
| **Media Library** | Upload, organize, and manage images, videos, audio, and documents with cloud storage (AWS S3, Contabo) support |
| **URL Shortening** | Integrated Bitly, TinyURL, Rebrandly, Short.io, and Slimu support for link shortening in posts |
| **Payment & Subscriptions** | Plans with credit-based quotas, Stripe/PayPal (one-time & recurring), Razorpay, Mollie, PayFast, and manual payments |
| **Affiliate Program** | Full referral/commission system with withdrawal management |
| **Admin Panel** | Comprehensive admin dashboard with user management, analytics, reporting, blog CMS, support ticketing, and system configuration |
| **Multi-Language** | Internationalization with 7+ languages (EN, FR, AR, RU, VI, TH, ZH-CN) and auto-translation via Google Translate |
| **Theming Engine** | Separate guest (public) and app (dashboard) themes with Vite-powered asset compilation |
| **Real-Time Updates** | Pusher/Reverb-based WebSocket broadcasting for live notifications |

---

## Architecture

### High-Level Architecture Diagram

```
┌─────────────────────────────────────────────────────────────────────┐
│                        CLIENT (Browser)                             │
│    Guest Theme (Nova)  ←→  App Theme (Pico)  ←→  Admin Theme (Pico)│
└───────────────┬──────────────────┬───────────────────┬──────────────┘
                │                  │                   │
       ┌────────▼──────────────────▼───────────────────▼────────┐
       │                   Laravel 11 Application                │
       │  ┌──────────────────────────────────────────────────┐   │
       │  │             Middleware Pipeline                   │   │
       │  │  Themes → Authentication → SetLocale → Routing   │   │
       │  └──────────────────────────────────────────────────┘   │
       │                                                         │
       │  ┌───────────────────────────────────────────────────┐  │
       │  │              94 Self-Contained Modules             │  │
       │  │  ┌─────────┐ ┌──────────┐ ┌────────────────────┐  │  │
       │  │  │  Admin   │ │   App    │ │  Payment/Auth/     │  │  │
       │  │  │ Modules  │ │ Modules  │ │  Guest Modules     │  │  │
       │  │  │ (53)     │ │ (33)     │ │  (8)               │  │  │
       │  │  └─────────┘ └──────────┘ └────────────────────┘  │  │
       │  └───────────────────────────────────────────────────┘  │
       │                                                         │
       │  ┌─────────────┐ ┌──────────┐ ┌──────────────────────┐ │
       │  │   Facades    │ │ Services │ │     Helpers          │ │
       │  │ Core, Access,│ │ AI, URL, │ │ Helper, Date,        │ │
       │  │ DBHelper,    │ │ DataTable│ │ Language, AI         │ │
       │  │ Media, Script│ │ Home     │ │                      │ │
       │  └─────────────┘ └──────────┘ └──────────────────────┘ │
       └────────────────────────┬────────────────────────────────┘
                                │
       ┌────────────────────────▼────────────────────────────────┐
       │                   Data Layer                             │
       │  ┌──────────┐  ┌───────────┐  ┌──────────────────────┐ │
       │  │  MySQL    │  │ File      │  │ External APIs        │ │
       │  │ Database  │  │ Storage   │  │ Facebook, Instagram, │ │
       │  │          │  │ (Local/S3)│  │ LinkedIn, X, TikTok, │ │
       │  │          │  │           │  │ OpenAI, Gemini, etc. │ │
       │  └──────────┘  └───────────┘  └──────────────────────┘ │
       └─────────────────────────────────────────────────────────┘
```

### Architectural Principles

1. **Modular Monolith** — Uses [`nwidart/laravel-modules`](https://github.com/nWidart/laravel-modules) to organize 94 self-contained modules, each with its own controllers, models, views, routes, migrations, and service providers.
2. **Facade Pattern** — Core cross-cutting concerns (database operations, permissions, media handling, script injection) are encapsulated in custom Laravel Facades.
3. **Service Layer** — Business logic is isolated in service classes (AI services, URL shorteners, publishing engine).
4. **Theme-Based Rendering** — Separate theme directories for guest-facing and app-facing views, with Vite-powered asset compilation per theme.
5. **Database-Driven Configuration** — Most settings are stored in an `options` table and accessed via `get_option()` / `update_option()` helpers.
6. **Database Module Activation** — Module enable/disable states are persisted in a `module_statuses` database table with a JSON file mirror.

---

## Technology Stack

### Backend

| Technology | Version | Purpose |
|---|---|---|
| **PHP** | ^8.2 | Runtime |
| **Laravel** | ^11.9 | Web framework |
| **Livewire** | 3.6.4 | Reactive UI components |
| **nwidart/laravel-modules** | ^11.1 | Module system |
| **hexadog/laravel-themes-manager** | ^1.13 | Theme management |
| **laravel/socialite** | ^5.21 | OAuth social login |
| **openai-php/laravel** | ^0.16.0 | OpenAI integration |
| **facebook/php-business-sdk** | ^21.0 | Facebook/Instagram API |
| **google/apiclient** | ^2.18 | YouTube/Google APIs |
| **intervention/image** | ^3.11 | Image processing |
| **php-ffmpeg/php-ffmpeg** | ^1.3 | Video processing |
| **barryvdh/laravel-dompdf** | ^3.1 | PDF generation |
| **league/csv** | ^9.22 | CSV import/export |
| **maatwebsite/excel** | * | Excel import/export |
| **yajra/laravel-datatables** | ^11 | Server-side DataTables |
| **pusher/pusher-php-server** | ^7.2 | Real-time broadcasting |
| **stripe/stripe-php** | ^17.1 | Stripe payments |
| **mollie/mollie-api-php** | ^3.4 | Mollie payments |
| **razorpay/razorpay** | ^2.9 | Razorpay payments |
| **payfast/payfast-php-sdk** | ^1.1 | PayFast payments |
| **stichoza/google-translate-php** | ^5.2 | Auto-translation |

### Frontend

| Technology | Version | Purpose |
|---|---|---|
| **Tailwind CSS** | ^4.1.5 | Utility-first CSS framework |
| **DaisyUI** | ^5.0.28 | Tailwind component library |
| **Alpine.js** | ^3.4.2 | Lightweight reactivity |
| **Preline** | ^3.0.1 | UI component library |
| **Vite** | ^5.0 | Asset bundling & HMR |
| **Laravel Echo** | ^2.0.2 | Real-time event listener |
| **Pusher JS** | ^8.4.0 | WebSocket client |
| **Axios** | ^1.7.4 | HTTP client |

### Infrastructure

| Component | Configuration |
|---|---|
| **Database** | MySQL (via `DB_CONNECTION=mysql`) |
| **Session Storage** | Database-backed |
| **Cache** | Database-backed |
| **Queue** | Sync (configurable to database/Redis) |
| **File Storage** | Local, AWS S3, Contabo S3 |
| **Broadcasting** | Pusher / Laravel Reverb |

---

## Directory Structure

```
Social-Media-Post-Scheduler/
├── app/                        # Core application code
│   ├── Activators/             # Module activation via database
│   ├── Console/Commands/       # Artisan CLI commands (theme tools)
│   ├── Facades/                # Custom Facades (10 facades)
│   ├── Helpers/                # Global helper functions (4 files)
│   ├── Http/
│   │   ├── Controllers/        # Base controller
│   │   └── Middleware/         # Authentication, Themes, SetLocale, HandleModuleNotFound
│   ├── Models/                 # Core Eloquent models (7 models)
│   ├── Providers/              # AppServiceProvider (single provider)
│   ├── Services/               # Service classes (15 services)
│   ├── Translation/            # Custom file loader for i18n
│   └── View/Components/        # Blade view components
├── bootstrap/                  # App bootstrap & custom autoloader
│   └── app.php                 # Middleware pipeline & module autoloader
├── config/                     # 17 configuration files
├── database/                   # Factories & seeders
├── installer/                  # Web-based installer UI
├── modules/                    # ★ 94 self-contained modules
├── public/                     # Web root (index.php, assets, robots.txt)
├── resources/
│   ├── fonts/                  # NotoSans font files
│   ├── lang/                   # 7 language JSON files
│   ├── stubs/                  # Theme scaffolding stubs
│   ├── themes/                 # Theme directories
│   │   ├── app/pico/           # Dashboard/admin theme
│   │   └── guest/nova/         # Public-facing theme (+ others)
│   └── modules_statuses.json   # Module enable/disable states
├── routes/                     # Base routing files
│   ├── auth.php                # Authentication routes
│   ├── web.php                 # Base web routes (minimal)
│   ├── console.php             # Console schedule
│   └── channels.php            # Broadcasting channels
├── storage/                    # Logs, cache, compiled views
├── tests/                      # Feature/unit tests (Pest)
├── .env                        # Environment configuration
├── composer.json               # PHP dependencies
├── package.json                # Node.js dependencies
├── vite.config.js              # Theme-aware Vite configuration
└── artisan                     # Laravel CLI entry point
```

---

## Core Application Layer

### Models (`app/Models/`)

| Model | Table | Purpose |
|---|---|---|
| `User` | `users` | Core user model with plan, team, and payment subscription relationships |
| `AIModel` | `ai_models` | AI model registry (provider, model_key, category, api_type, active status) |
| `Articles` | `articles` | Blog/CMS articles with categories and tags via pivot table |
| `ArticleCategories` | `article_categories` | Blog category model |
| `ArticleTags` | `article_tags` | Blog tag model |
| `ArticleMapTags` | `article_map_tags` | Pivot: articles ↔ tags |
| `ModuleStatus` | `module_statuses` | Module activation tracking |

### Facades (`app/Facades/`)

| Facade | Key | Responsibilities |
|---|---|---|
| **Core** | `core` | Module status management, sidebar rendering, date range parsing, module color management, asset loading/caching |
| **Access** | `access` | Permission checking (`check`, `canAccess`), plan expiration validation, role-based denial |
| **DBHelper** | `dbhelper` | Generic CRUD operations: `saveData` (insert/update with validation), `updateField` (batch field updates), `destroy` (batch deletion) |
| **Media** | `media` | File URL resolution (local/S3), file type detection (image, video, audio, document), storage disk management |
| **Script** | `Script` | Frontend asset injection: CSRF meta, global JS variables, module CSS/JS rendering, raw script injection |
| **AI** | `ai` | AI service facade |
| **DataTable** | `datatable` | Server-side DataTable handling |
| **HeaderManager** | `headermanager` | HTTP header management |
| **Home** | `home` | Home/landing page service |
| **URLShortener** | `urlshortener` | URL shortening service |

### Services (`app/Services/`)

| Service | Lines | Purpose |
|---|---|---|
| **AIService** | 307 | Central AI orchestrator — routes requests to platform-specific services based on category (text, image, video, speech, embedding, vision); tracks credit usage |
| **OpenAIService** | 12,472B | OpenAI GPT/DALL-E integration for text, image, TTS, STT, embedding |
| **GeminiService** | 495 | Google Gemini integration — text generation, Imagen/Gemini image generation, video analysis, vision |
| **ClaudeService** | 7,940B | Anthropic Claude integration for text generation |
| **DeepSeekService** | 7,146B | DeepSeek integration for text generation & reasoning |
| **DeepSpeekService** | 2,849B | Additional DeepSeek speech/text processing |
| **URLShortenerService** | 117 | URL shortening orchestrator — delegates to Bitly, TinyURL, Rebrandly, Short.io, Slimu |
| **BitlyService** | 951B | Bitly API client |
| **TinyURLService** | 727B | TinyURL API client |
| **RebrandlyService** | 1,074B | Rebrandly API client |
| **ShortioService** | 1,189B | Short.io API client |
| **SlimuService** | 909B | Slimu.in API client |
| **DataTableService** | ~10KB | Server-side DataTables processing with filtering, sorting, and pagination |
| **HomeService** | ~3.7KB | Landing page data aggregation |
| **HeaderManager** | 1,592B | HTTP header management |

### Helpers (`app/Helpers/`)

| Helper File | Key Functions |
|---|---|
| **Helper.php** (706 lines) | `get_option`, `update_option`, `price`, `theme_vite`, `get_curl`, `getLinkInfo`, `text2img`, `time_elapsed_string`, `tz_list`, `rand_string`, `spintax`, `canAccess`, `menu_active`, `module_url`, `data` (form binding), `watermark`, `FormatData` |
| **Date_Helper.php** (284 lines) | `date_show`, `datetime_show`, `date_sql`, `datetime_sql`, `timestamp_sql`, `dateFormatJs`, `dateTimeFormatJs`, `getDateFormats`, `getDateTimeFormats`, `php_to_js_date_format` |
| **Language_Helper.php** (17KB) | Internationalization utilities, language switching, translation loading |
| **AI_Helper.php** (1,303B) | AI-related helper functions |

### Middleware (`app/Http/Middleware/`)

| Middleware | Applied To | Purpose |
|---|---|---|
| **Authentication** (399 lines) | `web` group | User authentication, timezone setting, team resolution/creation, permission loading via Gates, sidebar registration, module booting, demo mode restriction, session role management (admin/client) |
| **Themes** (38 lines) | Global & `web` | Theme selection: `app/pico` for dashboard/admin, `guest/{frontend_theme}` for public pages |
| **SetLocale** | `web` group | User language preference application |
| **HandleModuleNotFound** | As needed | Graceful handling when a module cannot be found |

### Console Commands (`app/Console/Commands/`)

| Command | Purpose |
|---|---|
| `ExportTheme` | Export a theme to a distributable package |
| `MakeTailwindTheme` | Scaffold a new Tailwind-powered theme |
| `ThemeBuildCommand` | Build theme assets via Vite |
| `ThemeDevCommand` | Start Vite dev server for a theme |
| `ThemeAllBuildCommand` | Build all themes in sequence |

### AppServiceProvider (`app/Providers/`)

The single provider handles critical bootstrapping:

1. **Translation System** — Registers a custom `CustomFileLoader` for module-aware language loading
2. **Authentication Composer** — Shares `$user` and `$team` with all views; auto-logs out users without teams
3. **Module Registration** — Scans all modules and matches current URL to module routes
4. **Facade Registration** — Auto-aliases all Facade classes from `app/Facades/`
5. **Database Setup** — Loads options into config; auto-creates `cache`, `jobs`, `sessions`, `options`, `users`, and `languages` tables if they don't exist
6. **Helper Loading** — Includes all module helper files
7. **Blade Extensions** — Custom `@cans` and `@canany` directives for permission checks
8. **Module Status Sync** — Updates `modules_statuses.json` from database on every boot

---

## Module System — Detailed Breakdown

The application contains **94 modules** organized into 5 functional categories. Each module follows the `nwidart/laravel-modules` convention with this standard structure:

```
modules/{ModuleName}/
├── app/
│   ├── Console/            # Artisan commands
│   ├── Facades/            # Module-specific facades
│   ├── Hooks/              # boot.php for module initialization
│   ├── Http/Controllers/   # Module controllers
│   ├── Models/             # Eloquent models
│   ├── Providers/          # Service, route, event providers
│   └── Services/           # Business logic services
├── config/                 # Module configuration
├── database/migrations/    # Database migrations
├── helpers/                # Module helper functions
├── resources/
│   ├── assets/             # CSS/JS assets
│   └── views/              # Blade templates
├── routes/
│   ├── web.php             # Web routes
│   └── api.php             # API routes
├── module.json             # Module metadata (name, menu, permissions, assets)
├── composer.json           # Module dependencies
├── package.json            # Node dependencies
└── vite.config.js          # Module Vite config
```

Each module's `module.json` defines:
- **Menu placement** (`uri`, `section`, `tab_id`, `position`, `role`, `icon`, `color`)
- **Permission requirements** (`permission: true/false/-1`)
- **Asset declarations** (CSS/JS files to load globally)

### Admin Modules (53 modules — `Admin*` prefix)

These modules are accessible only when `login_as = "admin"` and route under `/admin/*`.

| Module | URI | Description |
|---|---|---|
| **AdminDashboard** | `admin/dashboard` | Admin analytics overview, statistics endpoints |
| **AdminUsers** | `admin/users` | User CRUD, team management, team member management |
| **AdminPlans** | `admin/plans` | Subscription plan management with feature/permission configuration |
| **AdminSettings** | `admin/settings` | System-wide settings (site info, timezone, formats, etc.) |
| **AdminAIConfiguration** | `admin/ai-configuration` | AI provider API keys, model selection per category |
| **AdminAICategories** | `admin/ai-categories` | AI content category management |
| **AdminAITemplates** | `admin/ai-templates` | AI content template management |
| **AdminAIReport** | `admin/ai-report` | AI usage analytics and credit consumption reports |
| **AdminAPIIntegration** | `admin/api-integration` | Social network API keys/secrets configuration |
| **AdminAddons** | `admin/addons` | Marketplace addon management |
| **AdminAffiliate** | `admin/affiliate` | Affiliate program management |
| **AdminAffiliateCommissions** | `admin/affiliate-commissions` | Commission tracking and management |
| **AdminAffiliateSettings** | `admin/affiliate-settings` | Affiliate program configuration |
| **AdminAffiliateWithdrawal** | `admin/affiliate-withdrawal` | Withdrawal request processing |
| **AdminBackendAppearance** | `admin/backend-appearance` | Dashboard UI customization (colors, sidebar, branding) |
| **AdminBlogCategories** | `admin/blog-categories` | Blog category CMS |
| **AdminBlogTags** | `admin/blog-tags` | Blog tag CMS |
| **AdminBlogs** | `admin/blogs` | Blog post CMS with rich content editor |
| **AdminBroadcast** | `admin/broadcast` | System-wide notification broadcasting |
| **AdminCaptcha** | `admin/captcha` | CAPTCHA configuration (reCAPTCHA, hCaptcha, etc.) |
| **AdminCoupons** | `admin/coupons` | Discount coupon management |
| **AdminCreditRates** | `admin/credit-rates` | AI credit-to-token conversion rates per model |
| **AdminCredits** | `admin/credits` | User credit management and allocation |
| **AdminCrons** | `admin/crons` | Cron job management and scheduling |
| **AdminEmbedCode** | `admin/embed-code` | Custom embed code injection (analytics, tracking) |
| **AdminFaqs** | `admin/faqs` | FAQ management |
| **AdminFrontendThemes** | `admin/frontend-themes` | Guest theme selection and configuration |
| **AdminLanguages** | `admin/languages` | Language management, translation editor, auto-translate |
| **AdminMailSender** | `admin/mail-sender` | Bulk email sending |
| **AdminMailServer** | `admin/mail-server` | SMTP/mail driver configuration |
| **AdminMailTemplates** | `admin/mail-templates` | Email template management |
| **AdminMailThemes** | `admin/mail-themes` | Email theme/layout management |
| **AdminManualPayments** | `admin/manual-payments` | Manual payment approval/rejection |
| **AdminMarketplace** | `admin/marketplace` | Module/addon marketplace |
| **AdminNotifications** | `admin/notifications` | System notification management |
| **AdminPaymentConfigurations** | `admin/payment-configurations` | Payment gateway setup (Stripe, PayPal, etc.) |
| **AdminPaymentHistory** | `admin/payment-history` | Payment transaction history |
| **AdminPaymentManualConfig** | `admin/payment-manual-config` | Manual payment method configuration |
| **AdminPaymentReport** | `admin/payment-report` | Revenue analytics and reports |
| **AdminPaymentSubscriptions** | `admin/payment-subscriptions` | Active subscription management |
| **AdminPlans** | `admin/plans` | Plan tier management with permission matrices |
| **AdminPrivacyPolicy** | `admin/privacy-policy` | Privacy policy CMS |
| **AdminProxies** | `admin/proxies` | Proxy server management for API calls |
| **AdminSettings** | `admin/settings` | Global system settings |
| **AdminSocialPages** | `admin/social-pages` | Social platform page management |
| **AdminSupport** | `admin/support` | Support ticket management |
| **AdminSupportCategories** | `admin/support-categories` | Support category management |
| **AdminSupportLabels** | `admin/support-labels` | Support label/tag management |
| **AdminSupportTypes** | `admin/support-types` | Support ticket type management |
| **AdminSystemInformation** | `admin/system-information` | PHP info, server diagnostics |
| **AdminTermsOfUse** | `admin/terms-of-use` | Terms of use CMS |
| **AdminThemes** | `admin/themes` | Backend theme management |
| **AdminURLShorteners** | `admin/url-shorteners` | URL shortener platform configuration |
| **AdminUserReport** | `admin/user-report` | User analytics and reports |

### App Modules (33 modules — `App*` prefix)

These modules serve end-users under `/app/*` with `role = "client"`.

| Module | URI | Description |
|---|---|---|
| **AppDashboard** | `app/dashboard` | User dashboard with post statistics, quotas, calendar overview |
| **AppPublishing** | `app/publishing` | ★ **Core module** — Post composer, calendar view, event scheduling, AJAX-based post saving, cron-based auto-publishing |
| **AppPublishingCampaigns** | `app/publishing-campaigns` | Campaign grouping for posts |
| **AppPublishingDraft** | `app/publishing-draft` | Draft post management |
| **AppPublishingLabels** | `app/publishing-labels` | Post labeling system |
| **AppChannels** | `app/channels` | Social channel management hub |
| **AppChannelFacebookPages** | `app/channel-facebook-pages` | Facebook Page connection & posting |
| **AppChannelFacebookProfiles** | `app/channel-facebook-profiles` | Facebook Profile connection |
| **AppChannelInstagramProfiles** | `app/channel-instagram-profiles` | Instagram Business account connection |
| **AppChannelInstagramUnofficial** | `app/channel-instagram-unofficial` | Instagram unofficial API integration |
| **AppChannelLinkedinPages** | `app/channel-linkedin-pages` | LinkedIn Company Page connection |
| **AppChannelLinkedinProfiles** | `app/channel-linkedin-profiles` | LinkedIn Personal Profile connection |
| **AppChannelTiktokProfiles** | `app/channel-tiktok-profiles` | TikTok account connection |
| **AppChannelXProfiles** | `app/channel-x-profiles` | X (Twitter) official API connection |
| **AppChannelXUnofficial** | `app/channel-x-unofficial` | X unofficial API integration |
| **AppAIContents** | `app/ai-contents` | AI content generation UI (text, images, prompts) |
| **AppAIPrompts** | `app/ai-prompts` | Saved AI prompt templates |
| **AppAIPublishing** | `app/ai-publishing` | AI-assisted post creation and direct publishing |
| **AppBulkPost** | `app/bulk-post` | CSV/Excel bulk post import and scheduling |
| **AppCaptions** | `app/captions` | Caption library management |
| **AppFiles** | `app/files` | File/media library (upload, organize, folders) |
| **AppGroups** | `app/groups` | Channel grouping for quick multi-channel selection |
| **AppMediaSearch** | `app/media-search` | Stock media search (Unsplash, Pexels, Pixabay, GIPHY, etc.) |
| **AppRssSchedules** | `app/rss-schedules` | RSS feed auto-scheduling configuration |
| **AppNotifications** | `app/notifications` | User notification center |
| **AppProfile** | `app/profile` | User profile management |
| **AppProxies** | `app/proxies` | User proxy management |
| **AppSupport** | `app/support` | Support ticket creation and messaging |
| **AppTeams** | `app/teams` | Team creation and member management |
| **AppTeamJoined** | `app/team-joined` | View teams the user has joined |
| **AppURLShorteners** | `app/url-shorteners` | User-level URL shortener configuration |
| **AppWatermark** | `app/watermark` | Watermark configuration for media |
| **AppAppearance** | `app/appearance` | User dashboard appearance settings |

### Payment Modules (6 modules)

| Module | URI | Description |
|---|---|---|
| **Payment** | `payment/*` | Payment controller hub: plan selection, checkout flow, webhook handling, subscription cancellation, manual payment |
| **PaymentStripe** | — | Stripe one-time payment gateway |
| **PaymentStripeRecurring** | — | Stripe recurring subscription gateway |
| **PaymentPaypal** | — | PayPal one-time payment gateway |
| **PaymentPaypalRecurring** | — | PayPal recurring subscription gateway |
| **AppSlimu** | — | Slimu URL shortener integration module |

### Auth & Guest Modules (2 modules)

| Module | URI | Description |
|---|---|---|
| **Auth** | `auth/*` | Full authentication flow (login, register, forgot password, social login, email verification) |
| **Guest** | `/` | Public-facing pages (homepage, pricing, blog, FAQ, contact, terms, privacy) |

---

## Data Flow & Processing

### 1. Post Publishing Pipeline

```
User Composes Post (Browser)
        │
        ▼
AppPublishingController::save()
        │ Validates input, creates/updates Posts model
        ▼
┌─────────────────────┐
│  Posts Table         │ status: 1 (scheduled), 2 (published), 3 (failed)
│  time_post:          │ timestamp for scheduled publish
│  accounts:           │ JSON array of target social account IDs
│  content, media, etc │
└─────────┬───────────┘
          │
          ▼ (Cron runs every minute via CronJobCommand or GET /app/publishing/cron?key=...)
          │
PublishingService::post()
          │ Validates quota → Iterates each social account
          │ → Delegates to social-specific posting Facade (e.g., \Post::facebook_page())
          ▼
External Social API (Facebook Graph, Instagram API, LinkedIn, X, TikTok)
          │
          ▼
PostStat record created (success/fail + social post ID + error message)
```

### 2. AI Content Generation Flow

```
User Request (Browser)
        │
        ▼
AppAIContentsController
        │ Receives prompt, category, options
        ▼
AIService::process()
        │ 1. Checks AI credit quota via \Credit::checkQuota()
        │ 2. Routes to platform service based on get_option("ai_platform")
        ▼
┌──────────────────────────────────────────┐
│  OpenAIService / GeminiService /         │
│  ClaudeService / DeepSeekService         │
│  → External API call (GPT, Gemini, etc.) │
└──────────────────────────────────────────┘
        │
        ▼
Response ←── tokens tracked → \Credit::trackUsage()
        │             (credits deducted from team quota)
        ▼
JSON response to browser
```

### 3. Payment & Subscription Flow

```
User Selects Plan → PaymentController::index()
        │
        ▼
PaymentController::checkout($gateway)
        │ Validates plan, checks coupons, calculates price
        │ Redirects to gateway (Stripe/PayPal/Razorpay/etc.)
        ▼
External Payment Gateway
        │ Success → PaymentController::success($gateway)
        │ Webhook → PaymentController::webhook($gateway)
        ▼
Update User Plan, Expiration Date, Team Permissions
Create PaymentSubscription record
```

### 4. Authentication & Team Resolution Flow

```
User Logs In → Authentication Middleware
        │
        ▼
1. Check user status (disabled → logout)
2. Set user's timezone
3. Resolve current team:
   a. Check session for current_team_id
   b. Fallback to owned team
   c. Fallback to joined team
   d. Auto-create team if none exists
4. Load permissions from team/member into Laravel Gates
5. Check module-level permissions (Access::check)
6. Register sidebar menu items based on:
   - Active modules
   - User role (admin/client)
   - User plan permissions
7. Boot all modules (include boot.php hooks)
8. Define global JS variables (CSRF, URL, locale, date format)
```

---

## Operational Workflows

### Workflow 1: Publishing a Social Media Post

1. User navigates to `/app/publishing` → `AppPublishingController::index()`
2. Calendar view loads via `events()` endpoint (AJAX)
3. User clicks "New Post" → `composer()` returns the compose modal
4. User fills in content, selects channels, sets schedule time
5. `save()` validates input, creates `Posts` record (status=1 for scheduled)
6. Cron job (`CronJobCommand`) runs periodically, finds due posts
7. `PublishingService::post()` iterates social accounts, calls platform-specific posting
8. `PostStat` records success/failure for each platform
9. Calendar auto-refreshes to show updated statuses

### Workflow 2: User Registration to First Post

1. Guest visits homepage (`Guest` module) → views plans
2. Clicks "Register" → `Auth` module handles registration
3. Auto-creates team with default plan permissions
4. Redirected to `/app/dashboard`
5. Navigates to `/app/channels` → connects social accounts via OAuth
6. Goes to `/app/publishing` → composes and schedules first post

### Workflow 3: Admin Administering the Platform

1. Admin logs in → session set to `login_as=admin`
2. `/admin/dashboard` shows platform-wide statistics
3. Admin manages plans at `/admin/plans` (set permissions, pricing)
4. Configures payment gateways at `/admin/payment-configurations`
5. Sets up AI API keys at `/admin/ai-configuration`
6. Manages social platform API keys at `/admin/api-integration`
7. Reviews user reports, payment reports, AI reports

### Workflow 4: Cron-Based Background Processing

1. External cron calls `GET /app/publishing/cron?key={cron_key}`
2. `CronJobCommand::handle()` executes
3. Finds all posts where `time_post <= now()` and `status = 1` (scheduled)
4. Processes each post through `PublishingService`
5. Updates post status (2=published, 3=failed)

---

## Authentication & Authorization

### Role System

| Role | Value | Access |
|---|---|---|
| **Admin** | `0` | Full admin panel access; can switch to client view |
| **Client** | `1` | App modules only; permissions defined by plan |

### Permission Model

1. **Plan-Based Permissions** — Each plan defines a JSON permission matrix (e.g., `apppublishing: 1`, `appchannels: 1`)
2. **Team Permissions** — Inherited from the plan; stored on the `Teams` model
3. **Member Permissions** — Team members can have custom permission subsets
4. **Gate-Based Enforcement** — Permissions are registered as Laravel Gates in `Authentication` middleware
5. **Module-Level Checks** — Each module's `module.json` declares `"permission": true/false/-1`
   - `true` → requires the module's key to be `1` in permissions
   - `false` → no permission check
   - `-1` → only show if the Gate is explicitly defined

### Expiration Enforcement

The `Access::isExpired()` method checks `user.expiration_date` against the current timestamp and blocks all feature access when expired.

---

## Theming System

### Structure

```
resources/themes/
├── app/pico/               # Dashboard/admin theme
│   ├── assets/
│   │   ├── css/app.css     # Theme CSS entry point
│   │   └── js/app.js       # Theme JS entry point
│   ├── public/             # Compiled Vite output
│   │   ├── .vite/manifest.json
│   │   ├── css/
│   │   └── js/
│   └── resources/views/    # Blade templates
│       ├── layouts/        # Master layout
│       └── ...             # Page templates
└── guest/nova/             # Public guest theme
    └── (same structure)
```

### Build Pipeline

```bash
# Development with HMR
npm run dev --theme=guest/nova

# Production build
npm run build --theme=app/pico
```

The `vite.config.js` dynamically selects entry points based on the `--theme` flag and outputs to `resources/themes/{theme}/public/`.

### Theme Resolution

The `Themes` middleware selects themes based on URL:
- `/app/*`, `/admin/*`, `/payment/*` → `app/pico`
- All other routes → `guest/{get_option('frontend_theme')}`

The `theme_vite()` helper detects whether the Vite dev server is running and injects either HMR scripts or production-compiled assets.

---

## AI Integration

### Supported Providers & Capabilities

| Provider | Text | Image | Video | Vision | Speech (TTS) | Speech-to-Text | Embedding |
|---|---|---|---|---|---|---|---|
| **OpenAI** | ✅ GPT-3.5/4/4.5 | ✅ DALL-E | ❌ | ✅ | ✅ | ✅ Whisper | ✅ |
| **Google Gemini** | ✅ Gemini 1.5/2.0/2.5 | ✅ Imagen + Gemini Flash | ✅ | ✅ | 🔜 | 🔜 | 🔜 |
| **Anthropic Claude** | ✅ Claude 3/3.5/4 | ❌ | ❌ | ❌ | ❌ | ❌ | ❌ |
| **DeepSeek** | ✅ Chat + Reasoner | ❌ | ❌ | ❌ | ❌ | ❌ | ❌ |

### Credit System

- Each AI operation consumes **credits** based on token usage or minutes
- `\Credit::convertToCredits(model, tokens)` maps model-specific rates
- Admins configure rates at `/admin/credit-rates`
- Team quotas are tracked and reset periodically via `\Plan::doResetQuota()`

---

## Payment & Subscription System

### Payment Gateways

| Gateway | One-Time | Recurring | Module |
|---|---|---|---|
| **Stripe** | ✅ | ✅ | `PaymentStripe`, `PaymentStripeRecurring` |
| **PayPal** | ✅ | ✅ | `PaymentPaypal`, `PaymentPaypalRecurring` |
| **Razorpay** | ✅ | ❌ | Via `Payment` module |
| **Mollie** | ✅ | ❌ | Via `Payment` module |
| **PayFast** | ✅ | ❌ | Via `Payment` module |
| **Manual** | ✅ | ❌ | Via `Payment` module |

### Plan System

- Plans define pricing, duration, and a permission matrix
- Each permission key corresponds to a module (e.g., `apppublishing`)
- Plans also define quotas: max posts/day, max channels, AI credits, storage limits
- User upgrades update `plan_id`, `expiration_date`, and team permissions

---

## Configuration & Environment

### Key `.env` Variables

| Variable | Purpose |
|---|---|
| `APP_NAME` | Application name (default: "Stackposts") |
| `APP_URL` | Full base URL for the application |
| `APP_INSTALLED` | Installation flag |
| `THEME_FRONTEND` | Default guest theme (e.g., `nova`) |
| `DEMO_MODE` | Restricts write operations for demo deployments |
| `DB_*` | MySQL connection parameters |
| `SESSION_DRIVER` | Session backend (`database`) |
| `CACHE_STORE` | Cache backend (`database`) |
| `QUEUE_CONNECTION` | Queue backend (`sync` / `database`) |
| `BROADCAST_CONNECTION` | WebSocket provider (`pusher`) |
| `FILESYSTEM_DISK` | Default storage (`local` / `aws`) |
| `AWS_*` | S3 storage credentials |

### Database-Driven Settings (`options` table)

Most application settings are stored in the `options` table and accessed via `get_option('key', 'default')`. Key options include:
- `currency`, `currency_symbol`, `currency_symbol_postion`
- `ai_platform`, `ai_platform_image`, `ai_gemini_api_key`, `ai_max_output_lenght`
- `cron_key`
- `url_shorteners_platform`
- `frontend_theme`
- `backend_sidebar_icon_color`, `backend_site_icon_color`
- `format_date`, `format_datetime`
- `embed_code_status`, `embed_code`

---

## Installation & Setup

### Prerequisites

- **PHP** ≥ 8.2 with extensions: `BCMath`, `Ctype`, `cURL`, `DOM`, `Fileinfo`, `JSON`, `Mbstring`, `OpenSSL`, `PDO`, `Tokenizer`, `XML`, `GD/Imagick`, `FFmpeg` (optional)
- **MySQL** ≥ 5.7 / **MariaDB** ≥ 10.3
- **Composer** ≥ 2.x
- **Node.js** ≥ 18.x & **npm** ≥ 9.x

### Installation Steps

1. **Clone the repository**
   ```bash
   git clone <repository_url> stackposts
   cd stackposts
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node.js dependencies**
   ```bash
   npm install
   ```

4. **Configure environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
   Edit `.env` with your database credentials and site URL.

5. **Run migrations**
   ```bash
   php artisan migrate
   ```

6. **Build frontend assets**
   ```bash
   npm run build --theme=guest/nova
   npm run build --theme=app/pico
   ```

7. **Set up the cron job** (for scheduled post publishing)
   ```bash
   * * * * * curl -s "https://yourdomain.com/app/publishing/cron?key=YOUR_CRON_KEY" > /dev/null
   ```

8. **Start the development server**
   ```bash
   composer dev
   ```
   This starts Laravel server, queue listener, log viewer, and Vite HMR concurrently.

### cPanel Deployment

1. Upload files to the hosting directory
2. Point the domain to the `public/` directory
3. Set up `.htaccess` for Passenger/PHP routing
4. Configure MySQL credentials in `.env`
5. Ensure the `storage/` and `bootstrap/cache/` directories are writable

---

## Development Workflow

### Daily Development

```bash
# Start all services concurrently (server, queue, logs, Vite HMR)
composer dev

# Or start individually:
php artisan serve                          # Laravel dev server
npm run dev --theme=app/pico               # Vite HMR for dashboard theme
php artisan queue:listen --tries=1         # Queue worker
```

### Theme Development

```bash
# Create a new theme
php artisan theme:make guest/my-theme

# Build a specific theme
npm run build --theme=guest/my-theme

# Build all themes
php artisan theme:build-all

# Export a theme
php artisan theme:export guest/my-theme
```

### Module Development

Each module is fully self-contained. To work on a module:
1. Edit files in `modules/{ModuleName}/`
2. Routes are auto-discovered from `routes/web.php`
3. Migrations are auto-discovered
4. Views are at `resources/views/`
5. Enable/disable via `module_statuses` table or admin panel

---

## File & Dependency Map

### Cross-System Dependencies

```
Authentication Middleware
    ├── depends on → Access Facade (permission checking)
    ├── depends on → Core Facade (sidebar, module status)
    ├── depends on → Script Facade (JS variable injection)
    ├── depends on → AdminUsers\Models\Teams
    ├── depends on → AdminUsers\Models\TeamMembers
    └── depends on → AdminPlans\Models\Plans

AppPublishing Module
    ├── depends on → AppChannels (account resolution)
    ├── depends on → AppChannelFacebook*/Instagram*/LinkedIn*/X*/TikTok* (platform posting)
    ├── depends on → Media Facade (file handling)
    ├── depends on → URLShortener Facade (link shortening)
    ├── depends on → Credit Facade (quota checking)
    └── depends on → Publishing Facade (orchestration)

AIService
    ├── depends on → OpenAIService
    ├── depends on → GeminiService
    ├── depends on → ClaudeService
    ├── depends on → DeepSeekService
    ├── depends on → AIModel (database model registry)
    └── depends on → Credit Facade (quota & tracking)

Payment Module
    ├── depends on → AdminPlans\Models\Plans
    ├── depends on → AdminPaymentSubscriptions\Models\PaymentSubscription
    ├── depends on → PaymentStripe / PaymentPaypal / etc.
    └── depends on → AdminManualPayments\Models\PaymentManual

Vite Build System
    ├── reads → resources/themes/{theme}/assets/
    ├── outputs → resources/themes/{theme}/public/
    └── manifest → resources/themes/{theme}/public/.vite/manifest.json
```

---

## Recommendations & Improvements

### 🔴 Critical (Security)

1. **Remove `.env` from version control** — The `.env` file contains database credentials and an application key. Add it to `.gitignore` immediately and rotate all credentials.

2. **Default admin password is plaintext** — The `AppServiceProvider::registerDB()` seeds a default admin with password `123456` stored as a plaintext string. This should use `bcrypt()` or `Hash::make()`.

3. **SSL verification disabled** — `get_curl()` in `Helper.php` and several other places disable SSL verification (`CURLOPT_SSL_VERIFYPEER = 0`). This should be enabled in production.

### 🟡 Architecture & Code Quality

4. **Consolidate duplicate DeepSeek services** — Both `DeepSeekService.php` (7,146B) and `DeepSpeekService.php` (2,849B) exist. The naming suggests a typo; consolidate into one service.

5. **Module status JSON file contains erroneous entries** — `modules_statuses.json` lists zip files and malformed names (e.g., `"AdminAIConfiguration.zip": true`, `"adminpaymentconfi": true`). Clean these up to prevent potential loading issues.

6. **Option typo** — `ai_max_output_lenght` should be `ai_max_output_length`. Consider a migration to fix this.

7. **Consider extracting database schema from ServiceProvider** — The `AppServiceProvider::registerDB()` method creates 6 tables inline during boot. These should be proper migration files for better version control and deployment practices.

8. **`get_option()` inserts on cache miss** — The function auto-inserts a new `options` row when a key doesn't exist. This can lead to database bloat and unexpected side effects; consider separating read and write operations.

### 🟢 Performance & Optimization

9. **Cache loaded options** — Options are loaded from the database on every request. Consider caching them with a TTL or using Laravel's config cache.

10. **Module asset loading** — `Core::loadModuleAssets()` clears and rebuilds cache on every call (`Cache::forget('module_assets')`). Remove the cache invalidation to actually benefit from caching.

11. **Move queue from `sync` to `database` or Redis** — Currently all queue jobs run synchronously, blocking request processing. Use database or Redis-backed queues for social media posting.

12. **Implement rate limiting** — Social media API calls should have rate limiting to avoid hitting platform quotas.

### 🔵 Developer Experience

13. **Add comprehensive tests** — The `tests/` directory has minimal test coverage. Consider adding feature tests for the publishing pipeline, payment workflow, and AI services.

14. **Add API documentation** — Consider generating OpenAPI/Swagger docs for the API routes.

15. **Implement CI/CD pipeline** — Add GitHub Actions for automated testing, linting (via Laravel Pint), and deployment.

---

## License

This project is proprietary software based on the [Stackposts](https://stackposts.com) platform. The underlying Laravel framework is open-sourced under the [MIT License](https://opensource.org/licenses/MIT).
