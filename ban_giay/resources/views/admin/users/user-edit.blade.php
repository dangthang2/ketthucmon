@extends('admin.master')

@section('content')
<div class="container mt-4">
    <h2>Sửa User</h2>
    <form action="{{ route('admin.user-update', $user->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="form-group">
            <label>Tên</label>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
        </div>
        <div class="form-group">
            <label>Mật khẩu (để trống nếu không đổi)</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="form-group">
            <label>Vai trò</label>
            <select name="vaitro" class="form-control">
                <option value="admin" {{ $user->vaitro == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="khachhang" {{ $user->vaitro == 'khachhang' ? 'selected' : '' }}>Khách hàng</option>
            </select>
        </div>
        <button class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('admin.user-list') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection
