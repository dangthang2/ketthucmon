<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up() {
        Schema::table('checkouts', function (Blueprint $table) {
            $table->enum('status', ['Chờ xử lý', 'Đang giao', 'Đã giao'])->default('Chờ xử lý')->change();
        });
    }
    
    public function down() {
        Schema::table('checkouts', function (Blueprint $table) {
            $table->string('status')->change();  // Trở lại kiểu string nếu cần
        });
    }
};
