<?php

namespace Database\Seeders;

use App\Models\About;
use App\Models\SiteSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        About::create([
            'title' => "Test About Title",
            'image' => "uploads/about/image1.jpg",
            'content' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure, quia in voluptas aperiam asperiores dolores enim ducimus iste ratione, vel optio odit placeat aspernatur? Reiciendis neque commodi quo aperiam ducimus!"
        ]);
    }
}
