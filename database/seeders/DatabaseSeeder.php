<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Candidate;
use App\Models\Category;
use App\Models\Commentary;
use App\Models\Headhunter;
use App\Models\Message;
use App\Models\Multimedia;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        Role::factory(15)->create();
        User::factory(15)->create();
        Candidate::factory(15)->create();
        Headhunter::factory(15)->create();
        Category::factory(15)->create();
        Multimedia::factory(15)->create();
        Commentary::factory(15)->create();
        Message::factory(15)->create();






        
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
       
    }
}
