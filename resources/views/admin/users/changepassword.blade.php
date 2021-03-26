@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
<h1>Chào {{ Auth::user()->name }} - Thay Đổi mật khẩu</h1>
<br>
@stop
@section('content')
<div class="card">
  <div class="card-body">
    @include('admin.layouts.alert_section')
    <div class="card-body">
      <form class="form" role="form" autocomplete="off" method="POST" action="{{ route('admin.current.change_password') }}">
        @csrf

        <div class="form-group">
          <label for="inputPasswordOld">Mật khẩu hiện tại</label>
          <input type="password" class="form-control" id="inputPasswordOld" name="current-password" required="">
          @error('current-password')
          <div class="alert alert-danger" role="alert">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="form-group">
          <label for="inputPasswordNew">Mật khẩu mới</label>
          <input type="password" class="form-control" id="inputPasswordNew" name="new-password" required="">
          <span class="form-text small text-muted">
            Mật khẩu phải có từ 8 -> 20 ký tự và <em>Không</em> bao gồm khoảng trắng.
          </span>
          @error('new-password')
          <div class="alert alert-danger" role="alert">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="form-group">
          <label for="inputPasswordNewVerify">Nhập lại mật khẩu mới</label>
          <input type="password" class="form-control" id="inputPasswordNewVerify" name="password-confirm" required="">
          <span class="form-text small text-muted">
            Để xác nhận, hãy nhập lại mật khẩu mới lần nữa
          </span>
          @error('password-confirm')
          <div class="alert alert-danger" role="alert">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-success btn-lg float-right">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
@stop
@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
@stop