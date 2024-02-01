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
        Schema::create('qoutation_lines', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger("qty");

            $table->unsignedBigInteger('item')->onDelete('cascade')->nullable();
            $table->foreign('item')->references('id')->on('items')->onDelete('cascade');
            $table->unsignedBigInteger('qoute_batch')->onDelete('cascade')->nullable();
             $table->foreign('qoute_batch')->references('id')->on('qoutation_batches')->onDelete('cascade');
            $table->unsignedDouble("material");
            $table->unsignedDouble("material_acc");
            $table->unsignedDouble("material_other");
            $table->unsignedDouble("labour");

            $table->unsignedDouble("labour_other");
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
        Schema::dropIfExists('qoutation_lines');
    }
};
