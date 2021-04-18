@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
<h1>Sửa menu</h1>
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
<div align="right" class="margin-button">
    <a href="{{ route('admin.types.index') }}" class="btn btn-secondary">Back</a>
</div>

<div class="card">
    <div class="card-body">
        <form method="post" action="{{ route('admin.types.update', $type->id) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tên loại</label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" value="{{ $type->name }}" />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Miêu tả</label>
                <div class="col-sm-10">
                    <input type="text" name="desc" class="form-control" value="{{ $type->desc }}" />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Slug</label>
                <div class="col-sm-10">
                    <input type="text" name="slug" class="form-control" value="{{ $type->slug }}" />
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