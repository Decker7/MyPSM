<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistersTable extends Migration
{
    public function up()
    {
        Schema::create('registers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('booking_id'); // Foreign key to payments table
            $table->string('approval_image'); // To store the uploaded image path
            $table->string('phone_number'); // Additional details from the user
            $table->string('status')->default('Pending'); // Removed 'after' clause
            $table->timestamps();

            // Set up the foreign key constraint
            $table->foreign('booking_id')->references('id')->on('payments')->onDelete('cascade');
        });

        
    }


    public function down()
    {
        Schema::dropIfExists('registers');

        Schema::table('registers', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
