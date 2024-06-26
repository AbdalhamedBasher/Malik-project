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

             $table->unsignedBigInteger('unit')->onDelete('cascade')->nullable();
             $table->foreign('unit')->references('id')->on('units')->onDelete('cascade');
            $table->unsignedDouble("material");
            $table->unsignedDouble("material_acc");
            $table->unsignedDouble("material_other");
            $table->unsignedDouble("labour");
            $table->unsignedDouble("labour_other");
         
            // total_material total_labour product_factor
            $table->unsignedDouble("total_material");
            $table->unsignedDouble("total_labour");
            
            $table->unsignedDouble("product_factor");
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
