<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFertilizerStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fertilizer_stocks', function (Blueprint $table) {
            $table->id();
            $table->integer('season_id');
           
            $table->integer('initial_amount')->default(0);
            $table->integer('current_amount')->default(0);
           
            $table->integer('fertilizer_id');
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
        Schema::dropIfExists('fertilizer_stocks');
    }
}
