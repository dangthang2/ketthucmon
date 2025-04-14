<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Checkout;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    // Hiển thị danh sách đơn hàng
    public function index()
    {
        // Lấy tất cả đơn hàng
        $checkouts = Checkout::all();
        return view('admin.checkout.index', compact('checkouts'));
    }

    // Hiển thị form chỉnh sửa trạng thái đơn hàng
    public function edit($id)
    {
        // Lấy thông tin đơn hàng theo id
        $checkout = Checkout::findOrFail($id);
        return view('admin.checkout.edit', compact('checkout'));
    }

    // Cập nhật trạng thái đơn hàng
    public function updateStatus(Request $request, $id)
    {
        // Kiểm tra xem trạng thái có hợp lệ không
        $validStatuses = ['Chờ xử lý', 'Đang giao', 'Hoàn thành'];

        if (!in_array($request->status, $validStatuses)) {
            return back()->withErrors(['status' => 'Trạng thái không hợp lệ']);
        }

        // Cập nhật trạng thái đơn hàng
        $checkout = Checkout::findOrFail($id);
        $checkout->status = $request->status;
        $checkout->updated_at = now();
        $checkout->save();

        // Quay lại danh sách đơn hàng và thông báo thành công
        return redirect()->route('admin.checkout-list')->with('success', 'Cập nhật trạng thái đơn hàng thành công!');
    }
}
