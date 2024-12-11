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
        Schema::create('calendar_data', function (Blueprint $table) {
            $table->id('calendar_id');
            $table->string('calendar_name');
            $table->string('file');
            $table->boolean('is_odd_term');
            $table->boolean('is_even_term');
            $table->boolean('is_institute');
            $table->boolean('is_university');
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
        Schema::dropIfExists('calendar_data');
    }
};
