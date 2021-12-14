<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->foreignId('restaurant_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('table_number')->comment('テーブル番号');
            $table->id();
            $table->integer('food_id')->comment('商品id')->nullable();
            $table->integer('count')->comment('個数');
            $table->integer('status')->comment('状況')->default('1');
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
        Schema::dropIfExists('orders');
    }
}
