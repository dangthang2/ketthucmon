<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdminphanhoiToLienheTable extends Migration
{
    public function up()
    {
        Schema::table('lienhe', function (Blueprint $table) {
            $table->text('adminphanhoi')->nullable()->after('noidung');
        });
    }

    public function down()
    {
        Schema::table('lienhe', function (Blueprint $table) {
            $table->dropColumn('adminphanhoi');
        });
    }
}
