@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
<h1>Danh sách dịch vụ</h1>
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
                    <td>€ịa chỉ</td>
                    <td>S€T</td>
                    <td>Công ty</td>
                    <td>Mã số thuế</td>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td><a href="{{ route('admin.users.edit', $user->id) }}">{{ $user->id }}</a></td>
                    <td>{{ $user->name }}</td>
                    <td><a href="{{ route('admin.users.edit', $user->id) }}">{{ $user->email }}</a></td>
                    <td>{{ $user->address }}</td>
                    <td>{{ $user->phone_number }}</td>
                    <td>{{ $user->company_name }}</td>
                    <td>{{ $user->tax_code }}</td>
                    <td>
                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('admin.user.demote', $user->id)}}" method="post" onsubmit="return confirm('Bạn có chắc chắn muốn cấp quyền quản trị cho tài khoản này không?');">
                            @csrf
                            @method('POST')
                            <button class="btn btn-warning" confirm="Bạn có chắc ko?" type="submit">Cấp quyền</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        {{ $users->links() }}
    </div>
</div>
@stop
@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
@stop