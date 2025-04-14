<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BanGiay;
use Illuminate\Support\Facades\DB; // Import DB
use App\Http\Controllers\Controller;

class GiayController extends Controller
{
    public function index()
    {
        // Lấy tất cả các sản phẩm giày
        $giay = BanGiay::all();
        return view('trangchu', compact('giay'));
    }

    public function show($id)
    {
        // Lấy thông tin giày chi tiết theo ID
        $giay = BanGiay::findOrFail($id);
        return view('chitietgiay', compact('giay'));
    }

    public function search(Request $request)
    {
        $query = $request->input('q');
        // Sử dụng Eloquent thay vì DB query builder
        $products = BanGiay::where('ten_giay', 'like', "%$query%")->get();
        
        return view('timkiem', compact('products', 'query'));
    }
    
    
}
