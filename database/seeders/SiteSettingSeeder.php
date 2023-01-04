<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SiteSetting::create([
            'govn_name' => 'Test Government',
            'ministry_name' => 'Test Ministry',
            'department_name' => 'Test Department',
            'office_name' => 'Test Office',
            'office_address' => 'Test Office',
            'office_contact' => 'Test Contact',
            'office_mail' => 'Test Mail',
            'main_logo' => 'mainlogo.jpg',
            'side_logo' => 'sidelogo.jpg',
            'facebook_link' => 'https://www.facebook.com/',
            'instagram_link' => 'https://www.instagram.com/',
            'social_link' => 'https://www.social.com/',
        ]);
    }
}
