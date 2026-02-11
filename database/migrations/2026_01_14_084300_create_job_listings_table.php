<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('job_listings', function (Blueprint $table) {
            $table->id();
            //$table->unsignedBigInteger('employer_id'); //foreign id table employer
            $table->foreignIdFor(\App\Models\Employer::class); 
            //exe dulu table employer, kemudian id nya diambil untuk exe table job_listings
            $table->string('title');
            $table->string('salary');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_listings');
    }
};

//php artisan migrate:fresh
// hapus data db, dan generate ulang, jika ada pe+an kolom employer_id