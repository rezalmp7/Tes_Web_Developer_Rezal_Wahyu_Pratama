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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->integer('users_id')->nullable()->default(null);
            $table->string('users_nama', 100)->nullable()->default(null);
            $table->enum('status', ["pending", "pengiriman", "selesai"])->nullable()->default(null);
            $table->dateTime('tgl_transaksi')->nullable()->default(null);
            $table->dateTime('tgl_bayar')->nullable()->default(null);
            $table->dateTime('tgl_kirim')->nullable()->default(null);
            $table->dateTime('tgl_selesai')->nullable()->default(null);
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
        Schema::dropIfExists('transaksis');
    }
};
