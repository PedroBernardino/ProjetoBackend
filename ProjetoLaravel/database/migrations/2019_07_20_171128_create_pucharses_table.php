<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePucharsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pucharses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('affiliate_code');
            $table->float('total_valor');
            $table->integer('product_quantity');
            $table->string('date');
            $table->unsignedBigInteger('client_id');
            $table->timestamps();
        });

        Schema::table('pucharses', function(Blueprint $table) {
            $table->foreign('client_id')->references('id')->on('clients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pucharses');
    }
}
