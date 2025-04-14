@extends('layout.master')

@section('content')
<div class="container mt-4">
    <h2>Phản hồi từ Admin</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tên</th>
                <th>Email</th>
                <th>Nội dung gửi</th>
                <th>Phản hồi từ Admin</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lienhes as $lienhe)
                <tr>
                    <td>{{ $lienhe->ten }}</td>
                    <td>{{ $lienhe->email }}</td>
                    <td>{{ $lienhe->noidung }}</td>
                    <td>
                        @if ($lienhe->adminphanhoi)
                            {{ $lienhe->adminphanhoi }}
                        @else
                            <span class="text-muted">Chưa có phản hồi</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
