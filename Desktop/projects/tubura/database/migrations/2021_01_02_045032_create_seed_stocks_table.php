<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeedStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seed_stocks', function (Blueprint $table) {
            $table->id();
            $table->integer('season_id');
           
            $table->integer('initial_amount')->default(0);
            $table->integer('current_amount')->default(0);
            $table->integer('seed_id');
            
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
        Schema::dropIfExists('seed_stocks');
    }
}
