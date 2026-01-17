<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        if (!Schema::hasColumn('produks', 'stok')) {
            Schema::table('produks', function (Blueprint $table) {
                $table->integer('stok')->default(0)->after('harga');
            });
        }
    }

    public function down()
    {
        Schema::table('produks', function (Blueprint $table) {
            if (Schema::hasColumn('produks', 'stok')) {
                $table->dropColumn('stok');
            }
        });
    }
};
