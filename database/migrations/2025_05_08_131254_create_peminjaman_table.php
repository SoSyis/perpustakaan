<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('buku_id')->constrained();
            $table->date('tanggal_pinjam');
            $table->string('status')->default('Dipinjam');
            $table->string('buku_link')->nullable()->comment('Masih dalam pengembangan');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('peminjaman');
    }
};
