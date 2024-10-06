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
        Schema::create('education_data', function (Blueprint $table) {
            $table->id('edu_id');
            $table->unsignedBigInteger('staff_id'); // Foreign key
            $table->string('degree', 50); // Degree name
            $table->string('university', 50); // University name
            $table->float('percentage'); // Percentage obtained
            $table->float('cgpa'); // CGPA
            $table->integer('passyear'); // Year of passing
            $table->boolean('status')->default(1); // Active status
            $table->timestamps(); // Created at & Updated at fields

            $table->foreign('staff_id')->references('staff_id')->on('staff_data')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('education_data');
    }
};
