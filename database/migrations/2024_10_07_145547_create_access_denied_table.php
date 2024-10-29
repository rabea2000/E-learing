<?php

use App\Models\User;
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
        Schema::create('access_denied', function (Blueprint $table) {
            $table->id();
            $table->string('device') ;
            $table->string('location') ; 
            $table->foreignIdFor(User::class) ;
        
            $table->timestamp('created_at', 0  );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('access_denied');
    }
};
