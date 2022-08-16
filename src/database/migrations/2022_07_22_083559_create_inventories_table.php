<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('place_id');
            $table->string('name');
            $table->string('brand');
            $table->string('description');
            $table->integer('quantity');
            $table->string('unit');
            $table->string('price');
            $table->string('item_code');
            $table->string('nup_code');
            $table->string('qr_code');
            $table->string('penguasaan_item');
            $table->string('tahun_perolehan');
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
        Schema::dropIfExists('inventories');
    }
};
