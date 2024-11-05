<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name'); // Activity name
            $table->string('activity_level'); // Activity level
            $table->decimal('budget', 8, 2); // Budget for the activity
            $table->string('time_frame'); // Time frame for the activity
            $table->string('image')->nullable(); // Image path (optional)
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('activities');
    }
}
