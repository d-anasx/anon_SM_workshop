<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD
            $table->integer('post_id');
            $table->foreign('post_id')->references('id')->on('posts');
            $table->text('comment');
=======
            $table->text('comment');
            $table->foreignId('post_id')->constrained();
>>>>>>> 796c097588c2589a595b3266ad7176c13a1436aa
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
