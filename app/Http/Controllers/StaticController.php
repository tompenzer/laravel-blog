<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

/**
 * Route static pages via a controller, (as opposed to a closure in the routes),
 * so that routes can be cached in production.
 */
class StaticController extends Controller
{
    /**
     * Display the mask demo resource.
     */
    public function maskDemo(): View
    {
        return view('maskdemo');
    }

    /**
     * Show the svg-image demo resource.
     */
    public function svgImage(): View
    {
        return view('svgimage');
    }
}
