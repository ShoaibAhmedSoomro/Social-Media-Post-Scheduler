<?php

namespace Modules\AdminURLShorteners\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminURLShortenersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('adminurlshorteners::index');
    }
}
