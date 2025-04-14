<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Hiển thị form đăng nhập
    public function showLoginForm() {
        return view('dangnhap'); // View đăng nhập
    }

    // Xử lý đăng nhập
    public function postLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->vaitro === 'admin') {
                return redirect()->route('trangadmin'); // Chuyển đến trang admin
            } else {
                return redirect()->route('trangchu'); // Chuyển đến trang khách hàng
            }
        }

        return back()->withErrors(['email' => 'Email hoặc mật khẩu không đúng.']);
    }

    // Hiển thị form đăng ký
    public function showRegisterForm() {
        return view('dangky');
    }

    // Xử lý đăng ký
    public function postRegister(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);

        // Mặc định vai trò là khách hàng
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'vaitro' => 'khachhang', // Gán vai trò mặc định là khách hàng
        ]);

        return redirect()->route('login')->with('success', 'Đăng ký thành công! Vui lòng đăng nhập.');
    }

    // Đăng xuất
    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }
}
