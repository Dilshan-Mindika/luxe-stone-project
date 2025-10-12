<?php

namespace App\Http\Controllers;

use App\Models\Service; 
use Illuminate\Http\Request;

class ServiceController extends Controller
{
   
    public function show(string $slug)
    {

        $service = Service::where('slug', $slug)->firstOrFail();

        return view('pages.service', compact('service'));
    }
}