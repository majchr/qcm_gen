<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupQcmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_qcm', function (Blueprint $table) {
            $table->integer('qcm_id')->unsigned();
            $table->foreign('qcm_id')->references('id')->on('qcms');
            $table->integer('group_id')->unsigned();
            $table->foreign('group_id')->references('id')->on('groups');
            $table->primary(['qcm_id', 'group_id']);
            $table->timestamp('date_debut');
            $table->timestamp('date_fin');
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
        Schema::dropIfExists('group_qcm');
            $table->dropColumn('date_debut');
            $table->dropColumn('date_fin');

            $table->dropForeign(['qcm_id']);
            $table->dropColumn('qcm_id');
            $table->dropForeign(['group_id']);
            $table->dropColumn('group_id');
    }
}
