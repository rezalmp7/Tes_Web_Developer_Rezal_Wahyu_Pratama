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
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->integer('transaksis_id')->nullable()->default(null);
            $table->integer('produks_id')->nullable()->default(null);
            $table->string('nama', 100)->nullable()->default(null);
            $table->integer('harga')->nullable()->default(null);
            $table->string('satuan')->nullable()->default(null);
            $table->text('gambar')->nullable()->default(null);
            $table->integer('qty')->nullable()->default(null);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesanans');
    }
};
