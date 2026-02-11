<?php

namespace Database\Factories;
use App\Models\Employer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'=> fake()->jobTitle(),
            'employer_id'=> Employer::factory(), 
            //import use App\Models\Employer; karena merefer Model Employer
            // syntax pada file migration create_joblisting; 
            // $table->foreignIdFor(\App\Models\Employer::class);
            //saat generate employer_id, bersamaan generate data employer, dan ambil id
            'salary'=>'$50,000 USD'
        ];
    }
}

//File ini dibuat 
// >php artisan make:factory JobFactory

//php artisan tinker
//App\Models\Job::factory()->create()
