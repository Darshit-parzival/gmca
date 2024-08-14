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
        Schema::create('student_data', function (Blueprint $table) {
            $table->id('stud_id'); 
            $table->string('enroll', 15)->nullable();
            $table->string('fname', 25);
            $table->string('mname', 25);
            $table->string('lname', 25);
            $table->char('gender',1)->nullable(false);
            $table->string('photo', 15);
            $table->bigInteger('mobile')->unique();
            $table->bigInteger('alt_mobile')->nullable();
            $table->bigInteger('wmobile')->nullable();
            $table->string('email', 30)->unique();
            $table->string('admission_year', 5);
            $table->string('aadhar', 15)->unique()->nullable();
            $table->boolean('isstudent')->default(1); 
            $table->string('caste_type', 20);
            $table->string('abc_id', 20)->unique();
            $table->string('address', 255);
            $table->string('graduation_stream', 50);
            $table->string('acpc_rollno', 15);
            $table->date('dob');
            $table->string('voterid', 20)->unique();
            $table->string('city', 20);
            $table->string('district', 20);
            $table->string('state', 20);
            $table->string('pincode', 10);
            $table->string('admission_cat', 10);
            $table->boolean('minority')->default(0); 
            $table->tinyInteger('admission_round');
            $table->boolean('tfw')->default(0);
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
        Schema::dropIfExists('student_data');
    }
};
