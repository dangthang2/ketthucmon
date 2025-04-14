@extends('layout.master')

@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Đăng ký</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb">
                <a href="{{ route('trangchu') }}">Trang chủ</a> / <span>Đăng ký</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">
        <form action="{{ route('postsignin') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold">👤 Họ và Tên</label>
                <input type="text" name="name" class="w-full px-4 py-2 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition" required>
                @error('name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold">📧 Email</label>
                <input type="email" name="email" class="w-full px-4 py-2 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-transparent transition" required>
                @error('email') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold">🔒 Mật khẩu</label>
                <input type="password" name="password" class="w-full px-4 py-2 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-transparent transition" required>
                @error('password') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold">🔒 Xác nhận mật khẩu</label>
                <input type="password" name="password_confirmation" class="w-full px-4 py-2 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-400 focus:border-transparent transition" required>
            </div>

            <button type="submit" class="w-full bg-gradient-to-r from-indigo-500 to-blue-500 text-white font-bold py-3 rounded-xl hover:shadow-lg transform hover:scale-105 transition">
                ✅ Đăng Ký
            </button>

            <p class="text-center mt-4 text-gray-700">
                📌 Đã có tài khoản? <a href="{{ route('login') }}" class="text-blue-600 font-semibold hover:underline">Đăng nhập ngay</a>
            </p>
        </form>
    </div>
</div>
@endsection
