<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFertilizerRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fertilizer_requests', function (Blueprint $table) {
            $table->id();
            $table->integer('season_id');
            $table->integer('farmer_id');
            $table->integer('fertilizer_id');
            
            $table->string('requested_amount');
            $table->string('given_amount');
            $table->boolean('approved')->nullable()->default(false);
            $table->boolean('received')->nullable()->default(false);

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
        Schema::dropIfExists('fertilizer_requests');
    }
}
