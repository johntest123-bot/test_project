@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
<h1>Danh sách tin tức</h1>
<br>
<a href="{{ route('admin.articles.create') }}" class="btn btn-primary">Thêm Mới Bài Viết</a>
@stop
@section('content')
<div class="card">
    <div class="card-body">
        @include('admin.layouts.alert_section')
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Tiêu đề</td>
                    <td>Danh mục</td>
                    <td>Nội dung</td>
                </tr>
            </thead>
            <tbody>
                @foreach($articles as $article)
                <tr>
                    <td>{{ $article->id }}</td>
                    <td>{{ $article->title }}</td>
                    <td>{{ $article->type->name }}</td>
                    <td>{!! Str::words(strip_tags($article->content), 30, '...') !!}</td>
                    <td>
                        <a href="{{ route('admin.articles.edit',$article->id) }}" class="btn btn-primary">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('admin.articles.destroy', $article->id)}}" method="post"
                            style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit"
                                onclick="return confirm('Bạn có chắc muốn xóa bài viết này?');">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        {{ $articles->links() }}
    </div>
</div>
@stop
@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
@stop