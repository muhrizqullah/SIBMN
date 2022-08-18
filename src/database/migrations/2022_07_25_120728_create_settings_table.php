<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('perwakilan');
            $table->string('lokasi');
            $table->string('kode_upb');
            $table->string('kepala_perwakilan');
            $table->timestamps();
        });

        DB::table('settings')->insert(
            array(
                'perwakilan' => 'BPK RI Perwakilan Provinsi Riau',
                'lokasi' => 'Pekanbaru',
                'kode_upb' => ' ',
                'kepala_perwakilan' => ' ',
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
};
