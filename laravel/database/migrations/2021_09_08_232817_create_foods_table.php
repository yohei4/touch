<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foods', function (Blueprint $table) {
            $table->foreignId('restaurant_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('categories_id')->comment('種類');
            $table->id();
            $table->string('name', 50)->comment('商品名');
            $table->integer('price')->comment('価格');
            $table->string('image_1')->comment('画像1');
            $table->string('image_2')->comment('画像2');
            $table->string('image_3')->comment('画像3');
            $table->string('image_4')->comment('画像4');
            $table->string('image_5')->comment('画像5');
            $table->string('movie')->comment('動画');
            $table->string('status')->comment('状態');
            $table->string('comment', 255)->comment('説明');
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
        Schema::dropIfExists('foods');
    }
}
