@extends('layout.master')

@section('content')
<div class="container mt-4">
    <h2>Danh sách Liên hệ</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Nội dung</th>
                <th>Phản hồi từ Admin</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lienhes as $lienhe)
                <tr>
                    <td>{{ $lienhe->id }}</td>
                    <td>{{ $lienhe->ten }}</td>
                    <td>{{ $lienhe->email }}</td>
                    <td>{{ $lienhe->sodienthoai }}</td>
                    <td>{{ $lienhe->noidung }}</td>
                    <td>{{ $lienhe->adminphanhoi }}</td>
                    <td>
                        <a href="{{ route('admin.lienhe-edit', $lienhe->id) }}" class="btn btn-primary">Sửa</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
