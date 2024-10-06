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
        Schema::create('expert_lecture_data', function (Blueprint $table) {
            $table->id('el_id'); // Primary key ID
            $table->unsignedBigInteger('staff_id'); // Foreign key
            $table->string('title', 30); // Title of the lecture
            $table->text('details'); // Details about the lecture
            $table->string('location', 40); // Location of the lecture
            $table->boolean('status')->default(1); // Status (active/inactive)
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
        Schema::dropIfExists('expert_lecture_data');
    }
};
