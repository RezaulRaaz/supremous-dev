<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrdvariantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prdvariants', function (Blueprint $table) {
            $table->id();
            $table->mediumText('variants_attribute');
            $table->unsignedBigInteger('variantion_id');
            $table->foreign('variantion_id')->references('id')->on('variations')->onDelete('cascade');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('prdvariants');
    }
}
