<?php

namespace Database\Seeders;

use App\Models\Config;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Config::insert([
            [
                'name' => 'logo',
                'value' => 'logo.png'
            ],
            [
                'name' => 'blogname',
                'value' => 'septiisdayanna'
            ],
            [
                'name' => 'title',
                'value' => 'Welcome To News portal'
            ],
            [
                'name' => 'caption',
                'value' => 'A Bootstrap 5 starter layout for your next blog homepage'
            ],
            [
                'name' => 'ads_widget',
                'value' => 'adsense 1'
            ],
            [
                'name' => 'ads_header',
                'value' => 'adsense 1'
            ],
            [
                'name' => 'ads_header',
                'value' => 'adsense 2'
            ],
            [
                'name' => 'ads_footer',
                'value' => 'adsense 3'
            ],
            [
                'name' => 'phone',
                'value' => '083352635247'
            ],
            [
                'name' => 'email',
                'value' => 'septiisdaynnaa@gmail.com'
            ],
            [
                'name' => 'facebook',
                'value' => 'facebook.com'
            ],
            [
                'name' => 'youtube',
                'value' => 'youtube.com'
            ],
            [
                'name' => 'instagram',
                'value' => 'instagram.com'
            ],
            [
                'name' => 'footer',
                'value' => 'Septi Isdayanna'
            ],
        ]);
    }
}
