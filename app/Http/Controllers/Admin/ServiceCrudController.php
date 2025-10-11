<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceCrudController extends Controller
{
    public function index() {
        $services = Service::all();
        return view('admin.services.index', compact('services'));
    }
    public function create() {
        return view('admin.services.create');
    }
    public function store(Request $request) {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'hero_image_url' => 'nullable|url',
            'icon_svg_path' => 'nullable|string',
        ]);
        $data['slug'] = Str::slug($request->title, '-');
        Service::create($data);
        return redirect()->route('admin.services.index')->with('success', 'Service created successfully.');
    }
    public function edit(Service $service) {
        return view('admin.services.edit', compact('service'));
    }
    public function update(Request $request, Service $service) {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'hero_image_url' => 'nullable|url',
            'icon_svg_path' => 'nullable|string',
        ]);
        $data['slug'] = Str::slug($request->title, '-'); // Regenerate slug on title change
        $service->update($data);
        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully.');
    }
    public function destroy(Service $service) {
        $service->delete();
        return redirect()->route('admin.services.index')->with('success', 'Service deleted successfully.');
    }
}