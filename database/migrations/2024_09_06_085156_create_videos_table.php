<?php

use App\Models\Classes;
use App\Models\Course;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->string("title") ;
            $table->string('description');
            $table->string('url');
            $table->integer("episode")->unique() ;
            $table->foreignIdFor(Course::class) ;
            // $table->foreignIdFor(Classes::class) ;
            $table->timestamps();

  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("videos");
    }
};
