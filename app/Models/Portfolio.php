<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; // <-- ADDED

class Portfolio extends Model
{
    use HasFactory; // <-- ADDED

    protected $fillable = [ // <-- CRITICAL FIX: Allows mass assignment
        'title', 
        'material', 
        'location', 
        'category', 
        'image_url'
    ];
}