<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQcmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qcms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titre', 150);
            $table->text('introduction');
            $table->Integer('breponse');
            $table->Integer('preponse');
            $table->Integer('mreponse');
            $table->boolean('partagee')->default(0);
            $table->Integer('bareme');
            
        
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
        Schema::dropIfExists('qcms');
    }
}
