<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item', function (Blueprint $table) {
            $table->increments('cod');
            $table->integer('item_idcustomer')->unsigned();
            $table->foreign('item_idcustomer')->references('id')->on('customer')->onDelete('cascade');
            $table->decimal('price', 11, 6);
            $table->string('description');
            $table->decimal('amount', 10, 4);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item');
    }
}
