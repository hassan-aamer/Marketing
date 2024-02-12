<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        About::create([
            'title'=>'About As',
            'description'=>'Welcome to the System | Development By ( Front End Mohamed Emad ) And ( Back End Hassan Mohamed )',
        ]);
    }
}
