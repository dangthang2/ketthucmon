<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LienHe;

class LienHeKhachController extends Controller
{
    public function index()
    {
        $lienhes = LienHe::latest()->get(); // Hoặc where theo user nếu có login
        return view('admin.lienhe.khach', compact('lienhes'));
    }
}
