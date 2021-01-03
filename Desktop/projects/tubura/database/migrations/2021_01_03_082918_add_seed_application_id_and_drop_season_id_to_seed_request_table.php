<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSeedApplicationIdAndDropSeasonIdToSeedRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fertilizer_requests', function (Blueprint $table) {
            $table->dropColumn('season_id');
            $table->integer('fertilizer_application_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fertilizer_requests', function (Blueprint $table) {
            //
        });
    }
}
