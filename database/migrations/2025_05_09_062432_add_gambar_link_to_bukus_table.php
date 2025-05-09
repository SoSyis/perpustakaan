<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up()
{
    Schema::table('bukus', function (Blueprint $table) {
        $table->string('gambar')->nullable()->after('kodeBuku');
        $table->string('link_buku')->nullable()->after('gambar');
    });
}

public function down()
{
    Schema::table('bukus', function (Blueprint $table) {
        $table->dropColumn(['gambar', 'link_buku']);
    });
}
};
