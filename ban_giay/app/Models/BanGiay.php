<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BanGiay extends Model
{
    use HasFactory;

    // Đặt tên bảng là ban_giay
    protected $table = 'ban_giay';

    // Các trường có thể được gán giá trị
    protected $fillable = [
        'ten_giay', 'danhmuc_id', 'gia', 'so_luong', 'mo_ta', 'chi_tiet', 'hinh_anh'
    ];

    // Quan hệ với Category (mỗi sản phẩm giày thuộc về một danh mục)
    public function category()
    {
        return $this->belongsTo(Category::class, 'danhmuc_id');
    }
}
