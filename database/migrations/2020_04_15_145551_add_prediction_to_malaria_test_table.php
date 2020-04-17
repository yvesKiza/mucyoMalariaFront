<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPredictionToMalariaTestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('malaria_tests', function (Blueprint $table) {
            $table->boolean('prediction');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('malaria_tests', function (Blueprint $table) {
            $table->dropColumn('prediction');
        });
    }
}
