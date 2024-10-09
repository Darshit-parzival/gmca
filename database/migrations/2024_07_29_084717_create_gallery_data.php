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
        Schema::create('gallery_data', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('event_id'); 
            $table->string('image', 250); 
            $table->string('type', 50);
            $table->boolean('status');
            $table->timestamps();
            $table->foreign('event_id')->references('id')->on('event_data')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gallery_data');
    }
};
