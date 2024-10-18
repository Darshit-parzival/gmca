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
        Schema::create('testimonials_data', function (Blueprint $table) {
            $table->id('t_id');  // Primary key (ID)
            $table->string('name', 50)->nullable(false);  // Name: Varchar(50), Not Null
            $table->string('message', 2000)->nullable(false);  // Message: Varchar(2000), Not Null
            $table->string('club', 50)->nullable(false);  // Club: Varchar(50), Not Null
            $table->boolean('status')->default(0);  // Status: Varchar(50), Not Null
            $table->timestamps();  // Adds created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('testimonials_data');
    }
};
