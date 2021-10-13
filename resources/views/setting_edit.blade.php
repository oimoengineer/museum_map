@extends('layout')

@section('content')
  <h1 class='mb-4'>ユーザー情報編集</h1>
  
  {{Form::open(['route' => 'user.update', 'files'=>true, $users->id])}}
    <div class="form-group mb-4">
      {{ Form::label('name', '名前') }}
      {{ Form::text('name', $users->name, ['class' => 'form-control']) }}
    </div><!-- /.form-group -->
    <div class="form-group mb-4">
      {{Form::label('email', 'メールアドレス')}}
      {{Form::text('email', $users->email, ['class' => 'form-control'])}}
    </div><!-- /.form-group -->

    <!-- エラーメッセージ -->
    @if(count($errors) > 0)
    <div class="container">
      <div class="alert alert-danger">
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </div><!-- /.alert -->
    </div><!-- /.container -->
    @endif

    <!-- 更新成功メッセージ -->
    @if (session('update_password_success'))
    <div class="container">
      <div class="alert alert-success">
        {{ session('update_password_success')}}
      </div><!-- /.alert -->
    </div><!-- /.container -->
    @endif

    <div class="form-group mb-4">
      {{Form::label('password', '新しいパスワード')}}
      {{Form::text('new-password', null, ['class' => 'form-control'])}}
    </div><!-- /.form-group -->
    <div class="form-group mb-5">
      {{Form::label('password', '新しいパスワード（確認）')}}
      {{Form::text('new-password_confirmation', null, ['class' => 'form-control'])}}
    </div><!-- /.form-group -->
    <div class="form-group mb-4">
      {{Form::submit('更新する', ['class' => 'btn btn-outline-dark pe-5 ps-5'])}}
    </div><!-- /.form-group -->
  {{Form::close()}}
  <div class="mt-4 mb-5">
    <a href={{route('user.setting')}}>マイページに戻る</a>
  </div>
@endsection