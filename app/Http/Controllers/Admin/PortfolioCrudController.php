<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioCrudController extends Controller
{
    public function index() {
        $ portfolioitems = Portfolio::all();
        return view('admin.portfolio.index', compact('portfolioitems'));
    }
    public function create() {
        $categories = ['kitchen', 'bathroom', 'flooring', 'staircase', 'commercial'];
        return view('admin.portfolio.create', compact('categories'));
    }
    public function store(Request $request) {
        $request->validate([
            'title' => 'required|string|max:255',
            'material' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'category' => 'required|in:kitchen,bathroom,flooring,staircase,commercial',
            'image_url' => 'required|url', 
        ]);
        Portfolio::create($request->all());
        return redirect()->route('admin.portfolio.index')->with('success', 'Portfolio item created successfully.');
    }
    public function edit(Portfolio $ portfolio) {
        $categories = ['kitchen', 'bathroom', 'flooring', 'staircase', 'commercial'];
        return view('admin.portfolio.edit', compact('portfolio', 'categories'));
    }
    public function update(Request $request, Portfolio $ portfolio) {
        $request->validate([
            'title' => 'required|string|max:255',
            'material' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'category' => 'required|in:kitchen,bathroom,flooring,staircase,commercial',
            'image_url' => 'required|url',
        ]);
        $ portfolio->update($request->all());
        return redirect()->route('admin.portfolio.index')->with('success', 'Portfolio item updated successfully.');
    }
    public function destroy(Portfolio $ portfolio) {
        $ portfolio->delete();
        return redirect()->route('admin.portfolio.index')->with('success', 'Portfolio item deleted successfully.');
    }
}