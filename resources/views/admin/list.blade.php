@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
<h1>Danh sách quản trị viên</h1>
<br>
@stop
@section('content')
<div class="card">
    <div class="card-body">
    @include('admin.layouts.alert_section')
    <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Tên</td>
          <td>Email</td>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td><a href="{{ route('admin.users.edit', $user->id) }}">{{ $user->id }}</a></td>
            <td>{{ $user->name }}</td>
            <td><a href="{{ route('admin.users.edit', $user->id) }}">{{ $user->email }}</a></td>
            <td>
                <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary">Sửa</a>
            </td>
            <td>
                <form action="{{ route('admin.user.delete', $user->id)}}" method="post" onsubmit="return confirm('Bạn có chắc chắn xóa tài khoản này không?');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" confirm="Bạn có chắc ko?" type="submit">Xóa tài khoản</button>
                </form>
                
            </td>
            <td>
                <form action="{{ route('admin.user.demote', $user->id)}}" method="post" onsubmit="return confirm('Bạn có chắc chắn muốn hủy quyền không?');">
                    @csrf
                    @method('POST')
                    <button class="btn btn-danger" confirm="Bạn có chắc ko?" type="submit">Hủy quyền</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>
    </div>
</div>
@stop
@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
@stop
