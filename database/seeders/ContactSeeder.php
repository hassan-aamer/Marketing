<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contact::create([
            'phone'=>'01129730475',
            'email'=>'hassanaamer048@gmail.com',
            'url_facebook'=>'https://www.facebook.com/profile.php?id=100009255534754&locale=ar_AR',
            'url_instagram'=>'https://www.instagram.com/hassan.m.aamer?fbclid=IwAR2x1LoY6aC3cZVmL5bu9t9tyHeHrSwu5swqsZVpswD8aCPysC8IbgD_zzE',
            'url_twitter'=>'https://www.facebook.com/profile.php?id=100011404864121&locale=ar_AR',
            'url_youtube'=>'https://www.linkedin.com/in/%E2%80%AAhassan-mohamed%E2%80%AC%E2%80%8F-537423264/',
            'location'=>'Cairo Egypt',
        ]);
    }
}
