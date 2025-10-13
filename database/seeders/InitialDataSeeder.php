<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;
use App\Models\Portfolio;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Initial Data Leader extends Seeder 
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. --- CREATE ADMIN USER (ID 1) ---
        // Clear all existing data from tables first.
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();
        DB::table('services')->truncate();
        DB::table('portfolios')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Check if the database driver is MySQL and reset the auto-increment counter manually
        if (DB::getDriverName() == 'mysql') {
            DB::statement('ALTER TABLE users AUTO_INCREMENT = 1;');
        }
        
        // This ensures the first user is the admin needed by AdminMiddleware
        User::create([
            'name' => 'Luxe Stone Admin',
            'email' => 'admin@luxestone.com',
            'password' => Hash::make('password'), // Use 'password' to log in
        ]);
        
        // --- END ADMIN USER CREATION ---


        // 2. Services Data (from RMP Multi Page/index.html & service-*.html)
        $servicesData = [
            [
                'title' => 'Kitchen Worktops',
                'subtitle' => 'Transform Your Kitchen with Premium Stone Surfaces',
                'description' => 'Natural stone is one of the most durable materials available, resistant to heat, scratches, and everyday wear.',
                'hero_image_url' => 'https://images.pexels.com/photos/1643383/pexels-photo-1643383.jpeg?auto=compress&cs=tinysrgb&w=1600',
                'icon_svg_path' => '<rect x="8" y="24" width="48" height="32" stroke="currentColor" stroke-width="2"/><rect x="12" y="28" width="40" height="4" fill="currentColor"/><circle cx="20" cy="44" r="3" fill="currentColor"/>',
            ],
            [
                'title' => 'Bathroom Renovations',
                'subtitle' => 'Luxurious transformations with premium stone vanities, walls, and flooring.',
                'description' => 'Stone surfaces provide a waterproof, luxurious, and highly durable finish essential for high-moisture environments like bathrooms.',
                'hero_image_url' => 'https://images.pexels.com/photos/1457842/pexels-photo-1457842.jpeg?auto=compress&cs=tinysrgb&w=1600',
                'icon_svg_path' => '<rect x="10" y="40" width="44" height="16" stroke="currentColor" stroke-width="2"/><path d="M18 40V20C18 18 20 16 22 16H42C44 16 46 18 46 20V40" stroke="currentColor" stroke-width="2"/><circle cx="32" cy="28" r="2" fill="currentColor"/>',
            ],
            [
                'title' => 'Flooring & Tiles',
                'subtitle' => 'Exquisite stone flooring solutions that create lasting impressions in any space.',
                'description' => 'From marble tiles to granite slabs, our flooring installations offer incredible durability and a natural, timeless look.',
                'hero_image_url' => 'https://images.pexels.com/photos/1571460/pexels-photo-1571460.jpeg?auto=compress&cs=tinysrgb&w=1600',
                'icon_svg_path' => '<rect x="8" y="8" width="48" height="48" stroke="currentColor" stroke-width="2"/><line x1="8" y1="20" x2="56" y2="20" stroke="currentColor" stroke-width="2"/><line x1="8" y1="32" x2="56" y2="32" stroke="currentColor" stroke-width="2"/><line x1="8" y1="44" x2="56" y2="44" stroke="currentColor" stroke-width="2"/>',
            ],
            [
                'title' => 'Staircases',
                'subtitle' => 'Elegant marble and granite staircases that serve as stunning architectural focal points.',
                'description' => 'A luxury stone staircase elevates the entire home, combining structural integrity with breathtaking design and finish.',
                'hero_image_url' => 'https://images.pexels.com/photos/1571453/pexels-photo-1571453.jpeg?auto=compress&cs=tinysrgb&w=1600',
                'icon_svg_path' => '<path d="M10 54L32 10L54 54" stroke="currentColor" stroke-width="2"/><line x1="16" y1="44" x2="48" y2="44" stroke="currentColor" stroke-width="2"/><line x1="20" y1="36" x2="44" y2="36" stroke="currentColor" stroke-width="2"/>',
            ],
            [
                'title' => 'Commercial Projects',
                'subtitle' => 'High-impact stone solutions for lobbies, restaurants, and corporate spaces.',
                'description' => 'We handle large-scale commercial projects, ensuring materials and installation meet the highest standards for heavy foot traffic and public display.',
                'hero_image_url' => 'https://images.pexels.com/photos/2747901/pexels-photo-2747901.jpeg?auto=compress&cs=tinysrgb&w=1600',
                'icon_svg_path' => '<path d="M12 28L32 8L52 28M12 28V52H52V28" stroke="currentColor" stroke-width="2"/>', // Generic commercial icon
            ],
        ];

        foreach ($servicesData as $data) {
            Service::firstOrCreate([
                'slug' => Str::slug($data['title']),
            ], $data);
        }

        // 3. Portfolio Items (from RMP Multi Page/portfolio.html)
        $ portfoliodata = [
            ['title' => 'Modern Kitchen Elegance', 'material' => 'Calacatta Marble', 'location' => 'London, UK', 'category' => 'kitchen', 'image_url' => 'https://images.pexels.com/photos/1643383/pexels-photo-1643383.jpeg?auto=compress&cs=tinysrgb&w=800'],
            ['title' => 'Spa-Inspired Bathroom', 'material' => 'Black Granite', 'location' => 'Manchester, UK', 'category' => 'bathroom', 'image_url' => 'https://images.pexels.com/photos/1457842/pexels-photo-1457842.jpeg?auto=compress&cs=tinysrgb&w=800'],
            ['title' => 'Grand Entrance Hall', 'material' => 'Carrara Marble', 'location' => 'Birmingham, UK', 'category' => 'flooring', 'image_url' => 'https://images.pexels.com/photos/1571460/pexels-photo-1571460.jpeg?auto=compress&cs=tinysrgb&w=800'],
            ['title' => 'Elegant Curved Staircase', 'material' => 'Emperor Marble', 'location' => 'Edinburgh, UK', 'category' => 'staircase', 'image_url' => 'https://images.pexels.com/photos/1571453/pexels-photo-1571453.jpeg?auto=compress&cs=tinysrgb&w=800'],
            ['title' => 'Contemporary Island Design', 'material' => 'White Granite', 'location' => 'Leeds, UK', 'category' => 'kitchen', 'image_url' => 'https://images.pexels.com/photos/1080721/pexels-photo-1080721.jpeg?auto=compress&cs=tinysrgb&w=800'],
            ['title' => 'Luxury Hotel Lobby', 'material' => 'Portoro Marble', 'location' => 'London, UK', 'category' => 'commercial', 'image_url' => 'https://images.pexels.com/photos/2747901/pexels-photo-2747901.jpeg?auto=compress&cs=tinysrgb&w=800'],
            ['title' => 'Master Bathroom Suite', 'material' => 'Statuario Marble', 'location' => 'Oxford, UK', 'category' => 'bathroom', 'image_url' => 'https://images.pexels.com/photos/1910472/pexels-photo-1910472.jpeg?auto=compress&cs=tinysrgb&w=800'],
            ['title' => 'Minimalist Perfection', 'material' => 'Absolute Black Granite', 'location' => 'Cambridge, UK', 'category' => 'kitchen', 'image_url' => 'https://images.pexels.com/photos/2724749/pexels-photo-2724749.jpeg?auto=compress&cs=tinysrgb&w=800'],
            ['title' => 'Open Plan Living', 'material' => 'Travertine', 'location' => 'Bristol, UK', 'category' => 'flooring', 'image_url' => 'https://images.pexels.com/photos/6969831/pexels-photo-6969831.jpeg?auto=compress&cs=tinysrgb&w=800'],
            ['title' => 'Fine Dining Restaurant', 'material' => 'Green Guatemala Marble', 'location' => 'Manchester, UK', 'category' => 'commercial', 'image_url' => 'https://images.pexels.com/photos/1838554/pexels-photo-1838554.jpeg?auto=compress&cs=tinysrgb&w=800'],
            ['title' => 'Modern Spiral Feature', 'material' => 'Nero marquina marble', 'location' => 'Liverpool, UK', 'category' => 'staircase', 'image_url' => 'https://images.pexels.com/photos/534151/pexels-photo-534151.jpeg?auto=compress&cs=tinysrgb&w=800'],
            ['title' => 'Country House Kitchen', 'material' => 'Kashmir White Granite', 'location' => 'Yorkshire, UK', 'category' => 'kitchen', 'image_url' => 'https://images.pexels.com/photos/2089698/pexels-photo-2089698.jpeg?auto=compress&cs=tinysrgb&w=800'],
        ];

        foreach ($ portfoliodata as $data) {
            Portfolio::firstOrCreate(['title' => $data['title']], $data);
        }
    }
}