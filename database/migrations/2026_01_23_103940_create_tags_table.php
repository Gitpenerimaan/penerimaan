<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * php artisan migrate// jalankan migrasi
     * php artisan migrate:rollback && php artisan migrate // jalankan bersamaan
     */
    public function up(): void
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

         Schema::create('job_tag', function (Blueprint $table) {
            //konvensi nama table "SINGULAR" dan digabung dg "_ untuk connecting table
            //u jalankan constrained di sql box ; PRAGMA foreign_keys = on
            $table->id();
            $table->foreignIdFor(\App\Models\Job::class, 'job_listing_id')->constrained()->cascadeOnDelete();
            //metod "foreignIdFor ada opsi overwrite tabel name, 
            // karena Job class merefer table Jobs bawaan laravel, bukan tbl job_listings
            $table->foreignIdFor(\App\Models\Tag::class)->constrained()->cascadeOnDelete();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tags');
        Schema::dropIfExists('job_tag');
    }
};
