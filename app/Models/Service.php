<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; // <-- ADDED

class Service extends Model
{
    use HasFactory; // <-- ADDED

    protected $fillable = [ // <-- CRITICAL FIX: Allows mass assignment
        'title', 
        'slug', 
        'subtitle', 
        'description', 
        'hero_image_url', 
        'icon_svg_path'
    ];
}