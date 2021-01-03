<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFertilizerApplicationIdAndDropSeasonIdToSeedRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('seed_requests', function (Blueprint $table) {
            $table->dropColumn('season_id');
            $table->integer('seed_application_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('seed_requests', function (Blueprint $table) {
            //
        });
    }
}
