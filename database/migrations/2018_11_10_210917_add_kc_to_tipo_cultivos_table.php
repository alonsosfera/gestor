<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddKcToTipoCultivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tipo_cultivos', function (Blueprint $table) {
          $table->string('KC_ENERO')->after('NombreFruto');
          $table->string('KC_FEBRERO')->after('KC_ENERO');
          $table->string('KC_MARZO')->after('KC_FEBRERO');
          $table->string('KC_ABRIL')->after('KC_MARZO');
          $table->string('KC_MAYO')->after('KC_ABRIL');
          $table->string('KC_JUNIO')->after('KC_MAYO');
          $table->string('KC_JULIO')->after('KC_JUNIO');
          $table->string('KC_AGOSTO')->after('KC_JULIO');
          $table->string('KC_SEPTIEMBRE')->after('KC_AGOSTO');
          $table->string('KC_OCTUBRE')->after('KC_SEPTIEMBRE');
          $table->string('KC_NOVIEMBRE')->after('KC_OCTUBRE');
          $table->string('KC_DICIEMBRE')->after('KC_NOVIEMBRE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tipo_cultivos', function (Blueprint $table) {
            //
        });
    }
}
