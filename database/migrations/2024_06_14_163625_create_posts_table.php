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
            $table->increments('id');
            $table->string('title', 191);
            $table->string('seotitle', 191);
            $table->unsignedInteger('user_id'); // Asumsi bahwa user_id tetap int(10) unsigned
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->text('content');
            $table->string('image', 191)->nullable()->default('noimage.jpg');
            $table->integer('hits')->default(0);
            $table->enum('active', ['yes', 'no'])->default('yes');
            $table->enum('status', ['publish', 'draft'])->default('publish');
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
