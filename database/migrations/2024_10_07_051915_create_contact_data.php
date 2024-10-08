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
        Schema::create('contact_data', function (Blueprint $table) {
            $table->id('c_id');  // Primary key (ID)
            $table->string('type', 20)->nullable(false);  // Type: Varchar(20), Not Null
            $table->string('name', 50)->nullable(false);  // Name: Varchar(50), Not Null
            $table->string('message', 2000)->nullable(false);  // Message: Varchar(2000), Not Null
            $table->string('email', 50)->nullable(false);  // Email: Varchar(50), Not Null
            $table->bigInteger('mobile')->nullable(false);  // Mobile: BigInt, Not Null
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
        Schema::dropIfExists('contact_data');
    }
};
