<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    // Đặt tên bảng là checkouts
    protected $table = 'checkouts';

    // Các trường có thể được gán giá trị
    protected $fillable = [
        'product_id', 'quantity', 'name', 'gender', 'email', 'address', 'phone', 'notes', 'payment_method', 'status'
    ];

    /**
     * Quan hệ với model BanGiay (mỗi checkout thuộc về một sản phẩm)
     */
    public function BanGiay()
    {
        return $this->belongsTo(BanGiay::class, 'product_id');
    }
}
