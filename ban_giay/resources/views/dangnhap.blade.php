@extends('layout.master')

@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Đăng nhập</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb">
                <a href="{{ route('trangchu') }}">Trang chủ</a><span>Đăng nhập</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(Session::has('flag'))
            <div class="alert alert-{{ Session::get('flag') }}">
                {{ Session::get('message') }}
            </div>
        @endif

        <form action="{{ route('postlogin') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold">📧 Email</label>
                <input type="email" name="email" class="w-full px-4 py-2 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400 focus:border-transparent transition" required>
                @error('email') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold">🔒 Mật khẩu</label>
                <input type="password" name="password" class="w-full px-4 py-2 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-transparent transition" required>
                @error('password') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <button type="submit" class="w-full bg-gradient-to-r from-purple-500 to-pink-500 text-white font-bold py-3 rounded-xl hover:shadow-lg transform hover:scale-105 transition">
                🚀 Đăng Nhập
            </button>

            <p class="text-center mt-4 text-gray-700">
                ❓ Chưa có tài khoản? <a href="{{ route('register') }}" class="text-pink-600 font-semibold hover:underline">Đăng ký ngay</a>
            </p>
        </form>
    </div>
</div>
@endsection
