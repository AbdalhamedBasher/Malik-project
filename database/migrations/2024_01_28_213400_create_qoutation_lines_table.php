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
            $table->unsignedBigInteger('item')->onDelete('cascade')->nullable();
            $table->foreign('item')->references('id')->on('items')->onDelete('cascade');
            $table->unsignedBigInteger('line')->onDelete('cascade')->nullable();
            $table->foreign('line')->references('id')->on('lines')->onDelete('cascade');
            $table->unsignedInteger("material");
            $table->unsignedInteger("material_acc");
            $table->unsignedInteger("labour");
            $table->unsignedInteger("labour_acc");
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
