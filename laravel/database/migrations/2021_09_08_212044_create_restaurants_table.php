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
            $table->string('restaurant_name')->comment('店名');
            $table->string('postal_code')->comment('郵便番号');
            $table->string('address_1')->comment('都道府県');
            $table->string('address_2')->comment('市区町村');
            $table->string('address_3')->comment('番地');
            $table->string('address_4')->nullable()->comment('建物名・部屋番号');
            $table->string('logo')->nullable()->comment('ロゴ');
            $table->string('tel')->nullable()->comment('電話番号');
            $table->integer('table_count')->nullable()->comment('テーブル数');
            $table->text('memo', 255)->nullable()->comment('お店の説明欄');
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
        Schema::dropIfExists('user');
        Schema::dropIfExists('food_types');
        Schema::dropIfExists('foods');
        Schema::dropIfExists('restaurants');
    }
}
