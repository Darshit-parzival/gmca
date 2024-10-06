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
        Schema::create('training_data', function (Blueprint $table) {
            $table->id('training_id'); // Primary Key
            $table->unsignedBigInteger('staff_id'); // Foreign key
            $table->string('title', 30); // Training title
            $table->string('organizer', 30); // Organizer name
            $table->tinyInteger('duration'); // Duration in hours/days
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
        Schema::dropIfExists('training_data');
    }
};
