<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Job;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'first_name' => 'john',
            'last_name' => 'doe',
            'email' => 'test@example.com'
        ]);

        $this->call(JobSeeder::class); 
        //exe Jobseeder difolder seeder
    }
}

// php artisan migrate:fresh --seed  //drop tables run migration also seed db