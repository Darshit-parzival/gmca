<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff_data', function (Blueprint $table){
            $table->id('staff_id');
            $table->string('name', 50)->nullable(false);
            $table->string('email', 50)->nullable(false)->unique();
            $table->bigInteger('phone',12)->unique()->nullable(false);
            $table->string('password', 60)->nullable(false);
            $table->char('gender',1)->nullable(false);
            $table->string('photo', 30)->nullable(false);
            $table->boolean('isadmin')->nullable(false);
            $table->boolean('isfaculty')->nullable(false);
            $table->boolean('isclubco')->nullable(false);
            $table->boolean('islibrarian')->nullable(false);
            $table->boolean('isstaff')->nullable(false);
            $table->string('designation', 40)->nullable(false);
            $table->integer('exp_year',2)->nullable();
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
        Schema::dropIfExists('staff_data');
    }
};
