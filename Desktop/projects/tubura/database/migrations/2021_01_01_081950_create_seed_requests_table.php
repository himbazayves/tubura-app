<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeedRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seed_requests', function (Blueprint $table) {
            $table->id();
            $table->integer('farmer_id');
            $table->integer('season_id');

            $table->integer('seed_id');
            
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
        Schema::dropIfExists('seed_requests');
    }
}
