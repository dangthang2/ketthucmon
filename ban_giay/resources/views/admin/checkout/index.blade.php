@extends('admin.master')

@section('content')
<div class="container mt-4">
    <h2>Danh sách đơn hàng</h2>

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
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($checkouts as $checkout)
                <tr>
                    <td>{{ $checkout->id }}</td>
                    <td>{{ $checkout->name }}</td>
                    <td>{{ $checkout->email }}</td>
                    <td>{{ $checkout->status }}</td>
                    <td>
                        <a href="{{ route('admin.checkout-edit', $checkout->id) }}" class="btn btn-primary">Sửa</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
