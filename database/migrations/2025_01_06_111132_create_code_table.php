<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCodeTable extends Migration
{
    public function up()
    {
        Schema::create('codes', function (Blueprint $table) { // Ensure the table name is 'codes'
            $table->id();
            $table->foreignId('activity_id')->constrained('activities')->onDelete('cascade');
            $table->string('code_number')->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('codes'); // Ensure the correct table name is specified here
    }
}
