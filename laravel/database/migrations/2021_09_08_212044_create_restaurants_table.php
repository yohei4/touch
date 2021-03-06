<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->string('name')->comment('店名');
            $table->string('address_1')->comment('住所1');
            $table->string('address_2')->nullable()->comment('住所2');
            $table->string('tel')->nullable()->comment('電話番号');
            $table->integer('table_count')->nullable()->comment('テーブル数');
            $table->string('comment')->nullable()->comment('お店の説明欄');
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
        Schema::dropIfExists('restaurants');
    }
}
