<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

//nama class atw nama model file adh nama 'singular' table pada db,
// jika di db ada table comments, maka nama modelnya Comment
// tambahkan protected $table = 'nama table' 
// agar classnya bisa dipanggil, meski nama modelnya beda dg nama tabel

class Job extends Model {

    use HasFactory;
    

    protected $table = 'job_listings'; // tanpa baris ini,
    //  return view('jobs', ['jobs'=> Job::all() syntak pada web, tdk jalan
    //karena mencari data tabel "jobs yg kosong

    // protected $guarded = []; //semua col bebas mass assignment
    // error: 1364 Field 'employer_id' doesn't have a default value 

    protected $fillable = ['employer_id', 'title', 'salary']; //agar bisa mass assignment

    public function employer() //ini relationship dg tbl employer
    {
        return $this->belongsTo(Employer::class);// Job belongsto Employer
    }

    public function tags()
    {
         return $this->belongsToMany(Tag::class, foreignPivotKey: "job_listing_id"); 
         //*Penting foreignPivotKey, ini mengacu pada tbl pivot "job_tag
         // defaultnya merefer col jobs.id, tapi karena table nya "job_listings, maka +kan spesifik nama col
        // return $this->belongsToMany(Tag::class);
    }
    
};

//php artisan tinker //ini mass assignment, agar jalan , + kan syntax protected $fillable
// >App\Models\Job::create(['title' =>'acme director', 'salary' =>'$1,000']);
//>App\Models\Job::all();
//>App\Models\Job::find(2); 2 adh nilai pada kolom id
//$job->delete(); hapus isi tabel
//php artisan help make:model  //help syntak make:model

// $job= App\Models\Job::first(); //tampilkan data pertama tabel job_listings
// $job->employer; //employer adh nama metod pada Model Job,
// called as property, bukan as metod, lrvl asumsi qta reques data Employer yg relate dg Job

//Job-tag relationship
//tinker> $job = App\Models\Job::find(1);
// $job -> tags; exe metod tags(), dg mengakses tabel job_tag, jika tabel ini kosong, maka return[]

//PANTAU N+1 dengan debugbar
//composer require fruitcake/laravel-debugbar --dev













 //class Job {
    // public static function all():array
    // {
    //    return [
    //      [
    //         'id'=> '1',
    //         'title' => 'diretor',
    //         'salary'=>'$50k'
    //     ],
        
    //     [
    //         'id'=> '2',
    //         'title' => 'sekertaris',
    //         'salary'=>'$30k'
    //     ],

    //     [
    //         'id'=> '3',
    //         'title' => 'jongos',
    //         'salary'=>'$10k'
    //     ]
    //          ];
    // }


    // public static function find(int $id):array
    // {
    //     //return Arr::first(Job::all(), fn($job)=> $job['id']== $id); 
    //     // //kita sudah ddlm model job jadi bisa dganti static

    //     $job =  Arr::first(static::all(), fn($job)=> $job['id']== $id); 

    //     if(! $job){
    //         abort(404);
    //     }

    // }
