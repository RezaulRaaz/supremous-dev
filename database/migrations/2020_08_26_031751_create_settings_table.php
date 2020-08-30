<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('Store_name');
            $table->mediumText('strore_description')->nullable();
            $table->mediumText('store_email')->nullable();
            $table->mediumText('store_mobile')->nullable();
            $table->mediumText('store_alterNate_mobile')->nullable();
            $table->mediumText('store_address')->nullable();
            $table->mediumText('store_fav_icon')->nullable();
            $table->mediumText('store_logo');
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
        Schema::dropIfExists('settings');
    }
}
