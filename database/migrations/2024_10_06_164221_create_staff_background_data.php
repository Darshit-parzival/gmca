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
        Schema::create('staff_background', function (Blueprint $table) {
            $table->id('bg_id'); // Primary key ID
            $table->unsignedBigInteger('staff_id'); // Foreign key
            $table->string('type', 20); // Type of background
            $table->string('name', 30); // Name of the background entry
            $table->text('details'); // Details about the background entry
            $table->boolean('status')->default(1); // Status (active/inactive)
            $table->timestamps(); // Created at & Updated at fields

            // Foreign key constraint
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
        Schema::dropIfExists('staff_background');
    }
};
