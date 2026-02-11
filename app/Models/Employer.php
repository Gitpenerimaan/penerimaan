<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Employer extends Model
{
    /** @use HasFactory<\Database\Factories\EmployerFactory> */
    use HasFactory;

    public function jobs()
    {
        return $this->hasMany(Job::class); //tiap employer(microsof) hasmany job
    }
}

//file ini dibuat  
//php artisan make:model Employer -f  //sekalian factory nya

//tinker
//$employer = App\Models\Employer::first();
//$employer->jobs; //jobs adh nama metod pada class Employer,
//output data table job_listings yg relate dg employer