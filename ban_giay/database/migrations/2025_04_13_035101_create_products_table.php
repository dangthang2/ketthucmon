<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ban_giay', function (Blueprint $table) {
            $table->id();
            $table->string('ten_giay');
            $table->unsignedBigInteger('danhmuc_id'); // liên kết đến danh mục nếu có
            $table->integer('gia');
            $table->integer('so_luong')->default(1);
            $table->text('mo_ta')->nullable();
            $table->text('chi_tiet')->nullable(); // ➕ Thêm cột chi tiết giày
            $table->string('hinh_anh')->nullable();
            $table->timestamps();
    
            // Nếu có bảng `danhmuc`, thì dùng dòng này
            // $table->foreign('danhmuc_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Sửa lại bảng cần xóa là 'ban_giay', không phải 'products'
        Schema::dropIfExists('ban_giay');
    }
};
