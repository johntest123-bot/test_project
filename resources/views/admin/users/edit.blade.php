@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
<h1>Chi tiết khách hàng: <b>{{ $user->name }}</b></h1>
@stop
@section('content')
@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div align="right">
    <a href="{{ route('admin.users.index') }}" class="btn btn-default">Back</a>
</div>
<br>
<div class="card">
    <div class="card-body">
        <form method="post" action="{{ route('admin.users.update', $user->id) }}" enctype="multipart/form-data"
            onsubmit="return confirm('Are you sure want to update this user ?')">
            @csrf
            @method('PUT')
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{ $user->id }}" disabled />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tên</label>
                <div class="col-sm-10">
                    <textarea class="form-control" disabled>{{ $user->name }}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <textarea class="form-control" disabled>{{ $user->email }}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Ảnh</label>
                <div class="col-sm-10">
                    <img src="{{ URL::to('/') }}/images/{{ $user->avatar }}" class="img-thumbnail" width="100" />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">€ịa chỉ</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{ $user->address }}" disabled />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">S€T</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{ $user->phone_number }}" disabled />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tên công ty</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{ $user->company_name }}" disabled />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">€ịa chỉ công ty</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{ $user->company_address }}" disabled />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Mã số thuế</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{ $user->tax_code }}" disabled />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label require">Quyền quản trị</label>
                <div class="col-sm-10">
                    <select name="is_admin" class="form-control">
                        @foreach ([1 => 'Quyền admin', 0 => 'Người dùng thông thường'] as $key => $value)
                        <option value="{{ $key }}" 
                            @if ($key == $user->is_admin)
                                selected="selected"
                            @endif
                        >
                            {{ $value }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group text-center">
                <input type="submit" name="add" class="btn btn-primary input-lg" value="Cập nhật" />
            </div>
        </form>
    </div>
</div>
@stop
@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop
