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
        Schema::create('posts', function (Blueprint $table) {
<<<<<<< HEAD
            $table->id();
            $table->integer('user_id');
            $table->string('title');
            $table->text('description');
            $table->foreign('user_id')->references('id')->on('users');
=======
            $table->id('id');
            $table->string('title');
            
            $table->text('descreption');
             $table->foreignId('user_id')->constrained();
>>>>>>> 796c097588c2589a595b3266ad7176c13a1436aa
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
