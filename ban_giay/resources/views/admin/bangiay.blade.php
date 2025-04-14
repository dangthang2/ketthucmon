@extends('admin.master')

@section('content')
<div class="container mt-4">
    <h2>Danh sách Giày</h2>
    <a href="{{ route('admin.bangiay-create') }}" class="btn btn-success mb-3">Thêm giày</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên giày</th>
                <th>Giá</th>
                <th>Hình ảnh</th>
                <th>Ngày tạo</th>
                <th>Ngày cập nhật</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($banGiays as $banGiay)
                <tr>
                    <td>{{ $banGiay->id }}</td>
                    <td>{{ $banGiay->ten_giay }}</td>
                    <td>{{ number_format($banGiay->gia, 0, ',', '.') }} đ</td>
                    <td>
                        @if($banGiay->hinh_anh)
                            <img src="{{ asset('images/' . $banGiay->hinh_anh) }}" width="100" height="100" alt="Hình ảnh giày">
                        @else
                            <p>Chưa có hình ảnh</p>
                        @endif
                    </td>
                    <td>{{ $banGiay->created_at }}</td>
                    <td>{{ $banGiay->updated_at }}</td>
                    <td>
                        <a href="{{ route('admin.bangiay-edit', $banGiay->id) }}" class="btn btn-primary btn-sm">Sửa</a>
                        <form action="{{ route('admin.bangiay-delete', $banGiay->id) }}" method="POST" style="display:inline-block;">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Bạn chắc chắn muốn xóa?')" class="btn btn-danger btn-sm">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
