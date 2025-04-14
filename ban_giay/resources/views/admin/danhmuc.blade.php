@extends('admin.master')

@section('content')
<div class="container mt-4">
    <h2>Danh sách Danh mục</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Form thêm mới -->
    <form action="{{ route('admin.cate-store') }}" method="POST" class="mb-4">
        @csrf
        <div class="form-group">
            <label for="name">Tên danh mục</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success mt-2">Thêm danh mục</button>
    </form>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên danh mục</th>
                <th>Ngày tạo</th>
                <th>Ngày cập nhật</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->created_at }}</td>
                    <td>{{ $category->updated_at }}</td>
                    <td>
                        <!-- Sửa danh mục -->
                        <form action="{{ route('admin.cate-update', $category->id) }}" method="POST" class="d-inline-block">
                            @csrf
                            <input type="text" name="name" value="{{ $category->name }}" class="form-control mb-1" required>
                            <button class="btn btn-primary btn-sm">Sửa</button>
                        </form>

                        <!-- Xóa danh mục -->
                        <form action="{{ route('admin.cate-delete', $category->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger btn-sm">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
