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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->text("name");
            $table->unsignedDouble('price');
            $table->unsignedBigInteger('size_number'); // here is the size for item
            $table->unsignedBigInteger('line')->onDelete('restrict')->nullable();
            $table->foreign('line')->references('id')->on('lines')->onDelete('restrict');


            // catogery
            $table->unsignedBigInteger('catogery')->onDelete('restrict')->nullable();
            $table->foreign('catogery')->references('id')->on('catogeries')->onDelete('restrict');
            // brand
            $table->unsignedBigInteger('brand')->onDelete('restrict')->nullable();
            $table->foreign('brand')->references('id')->on('brands')->onDelete('restrict');
            // // type
            $table->unsignedBigInteger('type')->onDelete('restrict')->nullable();
            $table->foreign('type')->references('id')->on('types')->onDelete('restrict');
            // // size or measure for items
            $table->unsignedBigInteger('size')->onDelete('restrict')->nullable();
            $table->foreign('size')->references('id')->on('sizes')->onDelete('restrict');


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
        Schema::dropIfExists('items');
    }
};
