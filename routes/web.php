<?php
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {

    //$jobs = Job::all(); 
    // dd($jobs);//$jobs adh collection,isi liat di browser attributes
    // dd($jobs[0]->title);

    return view('home', [
        'greeting'=>'hello',
        'user'=> 'lary'
    ]);
    
});

/* Route::get('/jobs', function () use ($jobs) { //use u $job declare d atas sblum ada model Job
   return view('jobs', ['jobs'=>$jobs] ); */

Route::get('/jobs', function () {    
   // $jobs = Job::with('employer')->get();
    $jobs = Job::with('employer')->latest()->paginate(5);

    //job with "relation pada model Job metod employer

    return view('jobs.index',['jobs' => $jobs] );

   // return view('jobs', ['jobs'=> Job::all() //Job Model disini, tdk merefer tabel jobs, melainkan job_listing table
   // ]);
});

//CREATE
Route::get('/jobs/create', function(){
    return view('jobs.create');
});


//SHOW
//route wildcard diposisikan paling bawah agar tdk "Trying to access array offset on null 
Route::get('/jobs/{id}', function ($id)  {
   
    // \Illuminate\Support\Arr::first($jobs, function($job) use ($id) { //cara lama
    //     return $job['id'] ==$id;

    // $job = \Illuminate\Support\Arr::first($jobs, fn($job)=> $job['id'] == $id); //refer ke var declared diatas
    // $job = \Illuminate\Support\Arr::first(Job::all(), fn($job)=> $job['id'] == $id); //refer ke model Job

    $job = Job::find($id); //"find" di class job not declared, bisa karena mmg opsi class adh find

    //cari array $jobs yg id nya  match dg wildcard pada url

    return view('jobs.show', ['job'=>$job]); 
    //$job berisi array $jobs yg sesuai id pada wildcard url
});

//EDIT
Route::get('/jobs/{id}/edit', function ($id)  {
  
    $job = Job::find($id); //"find" di class job not declared, bisa karena mmg opsi class adh find

    return view('jobs.edit', ['job'=>$job]); 
});


//STORE
Route::post('/jobs', function() {
    // dd(request()->all());
    request()->validate([
        //title dan salary adh id="" pada form create
        'title'=> ['required', 'min:3'],
        'salary'=> ['required']
    ]);

    Job::create([
        'title'=> request('title'),
        'salary'=> request('salary'),
        'employer_id'=> 1 //biasanya id diambil dari id user saat login
        //jika error NOT NULL constraint employer id, karena Model Job, set kolom id -> "fillable"
    ]);

    return redirect('/jobs');

});

/*UPDATE
PENTING: edit.blade , request PATCH tidak dimengerti browser(wrong attribut value), tapi laravel tau.
karena browser hanya paham GET dan POST,
siasati dg me+ directive @method('PATCH'), akan me+ hidden input */

Route::patch('/jobs/{id}', function ($id)  {
 
//VALIDATE
    request()->validate([
        //title dan salary adh id="" pada form create
        'title'=> ['required', 'min:3'],
        'salary'=> ['required']
    ]);
//AUTHOR

//UPDATE THE JOB, route model binding
$job = Job::findOrFail($id); //in case job id, tdk ada dalam DB, maka exception 

//CARA LAIN UPDATE
// $job->title = request('title');
// $job->salary = request('salary');
// $job->save();

$job->update([
    'title'=> request('title'),
    'salary' => request('salary'),
]);

return redirect('/jobs/' . $job->id);

});

//DESTROY, notice urlnya sama dg UPDATE
Route::delete('/jobs/{id}', function ($id)  {
 
    // $job = Job::findOrFail($id); 
    // $job->delete();

    Job::findOrFail($id)->delete();
    
    return redirect('/jobs') ;
});


Route::get('/contact', function () {
    return view('contact');
});



// $jobs = [
//         [
//             'id'=> '1',
//             'title' => 'diretor',
//             'salary'=>'$50k'
//         ],
        
//         [
//             'id'=> '2',
//             'title' => 'sekertaris',
//             'salary'=>'$30k'
//         ],

//         [
//             'id'=> '3',
//             'title' => 'jongos',
//             'salary'=>'$10k'
//         ]
//     ];

