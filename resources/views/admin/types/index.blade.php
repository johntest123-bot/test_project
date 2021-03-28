@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
<h1>Danh mục menu</h1>
@stop
@section('content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <form action="{{ route('admin.types.index') }}" method="GET" class="col-sm-5">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Tìm kiếm">
                    <div class="input-group-append_btn">
                        <button type="submit" class="btn btn-secondary" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
            <div class="margin-button col-sm-7">
                <a href="{{ route('admin.types.create') }}" class="btn btn-primary float-right">Thêm mới</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        @include('admin.layouts.alert_section')
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Tên loại</td>
                </tr>
            </thead>
            <tbody>
                @foreach($types as $type)
                <tr>
                    <td>{{$type->id}}</td>
                    <td>{{$type->name}}</td>
                    <td>
                        <a href="{{ route('admin.types.edit',$type->id) }}" class="btn btn-primary">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('admin.types.destroy', $type->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        {{ $types->links() }}
    </div>
</div>
@stop
@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
<script>
    console.log('Hi!');
</script>
@stop