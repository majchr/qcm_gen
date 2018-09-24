<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQcmUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qcm_user', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('qcm_id')->unsigned();
            $table->foreign('qcm_id')->references('id')->on('qcms');
            $table->integer('group_id')->unsigned();
            $table->foreign('group_id')->references('id')->on('groups');
            $table->double('note');
            $table->primary(['user_id', 'qcm_id', 'group_id'])->unique();
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
        Schema::dropIfExists('qcm_user');

            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
            $table->dropForeign(['qcm_id']);
            $table->dropColumn('qcm_id');
            $table->dropForeign(['group_id']);
            $table->dropColumn('group_id');
    }
}
