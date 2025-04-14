@extends('admin.master')

@section('content')
<div class="container mt-4">
    <h2>Danh sách User</h2>
    <a href="{{ route('admin.user-create') }}" class="btn btn-success mb-3">Thêm User</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th><th>Tên</th><th>Email</th><th>Vai trò</th><th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td><td>{{ $user->name }}</td><td>{{ $user->email }}</td><td>{{ $user->vaitro }}</td>
                <td>
                    <a href="{{ route('admin.user-edit', $user->id) }}" class="btn btn-primary btn-sm">Sửa</a>
                    <form action="{{ route('admin.user-delete', $user->id) }}" method="POST" style="display:inline;">
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
