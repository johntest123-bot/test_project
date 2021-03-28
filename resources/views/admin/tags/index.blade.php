@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
<h1>Danh sách tag</h1>
<br>
<a href="{{ route('admin.tags.create') }}" class="btn btn-primary">Thêm tag mới</a>
@stop
@section('content')
<div class="card">
    <div class="card-body">
        @include('admin.layouts.alert_section')
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Tên tag</td>
                    <td>Bài viết</td>
                </tr>
            </thead>
            <tbody>
                @foreach($tags as $tag)
                <tr>
                    <td>{{ $tag->id }}</td>
                    <td>{{ $tag->name }}</td>
                    <td>{{ $tag->post->title }}</td>
                    <td>
                        <form action="{{ route('admin.tags.destroy', $tag->id)}}" method="post"
                            style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit"
                                onclick="return confirm('Bạn có chắc muốn xóa tag này?');">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        {{ $tags->links() }}
    </div>
</div>
@stop
@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
@stop