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
        Schema::create('diary_data', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('diary');
            $table->date('date_created');
            $table->smallInteger('mood_rate');
            $table->binary('photo');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diary_data');
    }
};
