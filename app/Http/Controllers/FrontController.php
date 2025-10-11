<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Portfolio;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        // Fetch data to populate the home page dynamically
        $services = Service::all();
        // FIX: Variable name changed to match convention and Blade usage
        $portfolioItems = Portfolio::orderBy('created_at', 'desc')->take(4)->get();

        // FIX: Variable name changed in compact()
        return view('pages.index', compact('services', 'portfolioItems'));
    }

    public function about()
    {
        return view('pages.about'); // Uses content from RMP Multi Page/about.html
    }

    public function portfolio()
    {
        // Fetch all categories and portfolio items for the filter functionality
        $categories = Portfolio::select('category')->distinct()->pluck('category')->toArray();
        // FIX: Variable name changed to match convention and Blade usage
        $portfolioItems = Portfolio::all();

        // FIX: Variable name changed in compact()
        return view('pages.portfolio', compact('portfolioItems', 'categories'));
    }

    public function contact()
    {
        return view('pages.contact'); // Uses content from RMP Multi Page/contact.html
    }
}