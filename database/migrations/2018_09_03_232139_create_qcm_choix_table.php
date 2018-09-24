<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQcmChoixTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('choix_qcm', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('qcm_id')->unsigned();
            $table->foreign('qcm_id')->references('id')->on('qcms');
            $table->integer('choix_id')->unsigned();
            $table->foreign('choix_id')->references('id')->on('choices');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->primary(['qcm_id', 'choix_id']);
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
        Schema::dropIfExists('choix_qcm');

            $table->dropForeign(['qcm_id']);
            $table->dropColumn('qcm_id');
            $table->dropForeign(['choix_id']);
            $table->dropColumn('choix_id');
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
    }
}
