<?php

namespace App\Http\Controllers\Syiar;

use App\Http\Controllers\Controller;
use App\Models\Product;
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

    /**
     * Step 1: Start Syiar (Select Product)
     */
    public function start(): View
    {
        $products = Product::where('status', 'active')
            ->orderBy('name')
            ->get();

        return view('syiar.start', compact('products'));
    }
}
