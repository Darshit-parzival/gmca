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
        Schema::create('webportal_data', function (Blueprint $table) {
            $table->id();
            $table->string('webportal_type', 30);
            $table->string('webportal_title', 30);
            $table->string('webportal_details', 250);
            $table->string('webportal_file', 30);
            $table->boolean('webportal_status'); 
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
        Schema::dropIfExists('webportal_data');
    }
};
