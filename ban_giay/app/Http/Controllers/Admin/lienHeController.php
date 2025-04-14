<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LienHe;
use Illuminate\Http\Request;

class LienHeController extends Controller
{
    // Hiển thị danh sách liên hệ
    public function index()
    {
        $lienhes = LienHe::all();
        return view('admin.lienhe.index', compact('lienhes'));
    }

    // Hiển thị form chỉnh sửa phản hồi của admin
    public function edit($id)
    {
        $lienhe = LienHe::findOrFail($id);
        return view('admin.lienhe.edit', compact('lienhe'));
    }

    // Cập nhật phản hồi của admin
    public function update(Request $request, $id)
    {
        $lienhe = LienHe::findOrFail($id);
        $lienhe->adminphanhoi = $request->adminphanhoi;
        $lienhe->save();

        return redirect()->route('admin.lienhe-list')->with('success', 'Cập nhật phản hồi thành công!');
    }
}
