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
            $table->unsignedBigInteger('qoute')->onDelete('cascade')->nullable();
            $table->foreign('qoute')->references('id')->on('qoutations')->onDelete('cascade');
            $table->unsignedInteger("material");
            $table->unsignedInteger("material_acc");
            $table->unsignedInteger("material_other");
            $table->unsignedInteger("labour");
            $table->unsignedInteger("labour_acc");
            $table->unsignedInteger("labour_other");
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
