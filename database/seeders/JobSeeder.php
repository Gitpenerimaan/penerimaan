<?php

namespace Database\Seeders;
use App\Models\Job;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Job::factory(10)->create();
    }
}


// file ini dibuat
// php artisan make:seeder
//kemudian named; JobSeeder.php

//exe hanya JobSeeder(bukan semua seeder table)
//>php artisan db:seed --class=JobSeeder