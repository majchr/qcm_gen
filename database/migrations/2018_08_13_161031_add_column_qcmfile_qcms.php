<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnQcmfileQcms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('qcms', function (Blueprint $table) {
            //
            $table->string('qcmfile')->nullable()->after('introduction');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('qcms', function (Blueprint $table) {
            //
            $table->dropColumn('qcmfile');
        });
    }
}
