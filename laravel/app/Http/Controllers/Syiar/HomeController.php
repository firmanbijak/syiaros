<?php

namespace App\Http\Controllers\Syiar;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    /**
     * Display the Syiar main page.
     */
    public function index(): View
    {
        return view('syiar.index');
    }
}
