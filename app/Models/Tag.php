<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /** @use HasFactory<\Database\Factories\TagFactory> */
    use HasFactory;

    public function jobs()
    {
        // return $this->belongsToMany(Job::class); 
        // //defaultnya cari relasi pada jobs.id, karena tabelnya "job_listings maka +kan arg relatedPivotKey
        return $this->belongsToMany(Job::class, relatedPivotKey: 'job_listing_id');
        
    }
}


//tinker
// $tag = App\Models\Tag::find(1);
// $tag->jobs; tampilkan tag relate dg jobs
// $tag->jobs()->attach(App\Models\Job::find(1)); 
// *penting ...insert data ke tabel pivot job_tag
//$tag->jobs()->get()
//$tag->jobs()->get()->pluck('title') 
// tanpa ctrlc, show 'title' dari tabel job_listings yg relate tag.id =1
