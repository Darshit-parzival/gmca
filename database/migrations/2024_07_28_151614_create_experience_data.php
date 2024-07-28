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
            Schema::create('experience_data', function (Blueprint $table) {
                $table->id('exp_id');  
                $table->unsignedBigInteger('staff_id');  
                $table->string('designation', 30);
                $table->integer('from');
                $table->integer('to');
                $table->string('organization', 50);
                $table->boolean('status');
                $table->timestamps();
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
        Schema::dropIfExists('experience_data');
    }
};
