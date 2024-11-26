<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('produk', function (Blueprint $table) {
            $table->string('foto')->nullable()->after('harga'); // Menambah kolom foto setelah kolom harga
        });
    }
    
    public function down()
    {
        Schema::table('produk', function (Blueprint $table) {
            $table->dropColumn('foto');
        });
    }
    
};
