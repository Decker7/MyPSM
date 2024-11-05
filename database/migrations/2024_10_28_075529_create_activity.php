<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('activity', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('activity_level'); // e.g., Low, Medium, High
            $table->decimal('budget', 8, 2); // Store budget as decimal
            $table->string('time_frame'); // e.g., One Week, Two Weeks, etc.
            $table->string('image')->nullable(); // Optional image path, set as nullable
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('activity');
    }
};

