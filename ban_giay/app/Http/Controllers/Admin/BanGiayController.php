<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BanGiay; // Model của giày
use App\Models\Category; // Model của danh mục (nếu cần)

class BanGiayController extends Controller
{
    // Hiển thị danh sách giày
    public function index()
    {
        $banGiays = BanGiay::all();
        return view('admin.bangiay', compact('banGiays'));
    }

    // Hiển thị form thêm giày
    public function create()
    {
        $categories = Category::all(); // Lấy tất cả danh mục (nếu có)
        return view('admin.bangiay_create', compact('categories'));
    }

    // Xử lý thêm giày
    public function store(Request $request)
{
    $request->validate([
        'ten_giay' => 'required',
        'gia' => 'required|numeric',
        'hinh_anh' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        'danhmuc_id' => 'required|exists:categories,id',
    ]);

    $fileName = null;
    if ($request->hasFile('hinh_anh')) {
        $file = $request->file('hinh_anh');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('images'), $fileName); // lưu vào thư mục public/images
    }

    BanGiay::create([
        'ten_giay' => $request->ten_giay,
        'gia' => $request->gia,
        'hinh_anh' => $fileName, // lưu tên file vào DB
        'danhmuc_id' => $request->danhmuc_id,
    ]);

    return redirect()->route('admin.bangiay-list')->with('success', 'Thêm giày thành công!');
}

    // Hiển thị form sửa giày
    public function edit($id)
    {
        $banGiay = BanGiay::findOrFail($id);
        $categories = Category::all(); // Lấy tất cả danh mục (nếu có)
        return view('admin.bangiay_edit', compact('banGiay', 'categories'));
    }

    // Xử lý sửa giày
    public function update(Request $request, $id)
    {
        $request->validate([
            'ten_giay' => 'required|string|max:255',
            'gia' => 'required|integer',
            'hinh_anh' => 'nullable|image|max:2048',
        ]);

        $banGiay = BanGiay::findOrFail($id);
        $banGiay->ten_giay = $request->ten_giay;
        $banGiay->gia = $request->gia;
        $banGiay->danhmuc_id = $request->danhmuc_id;
        $banGiay->so_luong = $request->so_luong ?? 1;

        // Lưu ảnh mới nếu có
        if ($request->hasFile('hinh_anh')) {
            $imagePath = $request->file('hinh_anh')->store('public/images');
            $banGiay->hinh_anh = $imagePath;
        }

        $banGiay->save();

        return redirect()->route('admin.bangiay-list')->with('success', 'Cập nhật giày thành công!');
    }

    // Xử lý xóa giày
    public function destroy($id)
    {
        $banGiay = BanGiay::findOrFail($id);
        $banGiay->delete();

        return redirect()->route('admin.bangiay-list')->with('success', 'Xóa giày thành công!');
    }
}
