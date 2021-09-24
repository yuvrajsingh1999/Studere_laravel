<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Userprofile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('facultyprofile', function (Blueprint $table) {
            $table->id();
            $table->string('gender');
            $table->string('address');
            $table->string('department');
            $table->string('class');
            $table->string('sem');
            $table->string('phone');
            $table->unsignedBigInteger('user_id');
            $table->date('dob');
            $table->string('profile_pic')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
          
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::dropIfExists('facultyprofile');
    }
}
