@extends('layout')

@section('content')
  <h1 class='mb-4'>ユーザー情報編集</h1>

    <!-- 更新成功メッセージ -->
    @if (session('update_password_success'))
    <div class="container">
      <div class="alert alert-success">
        {{ session('update_password_success')}}
      </div><!-- /.alert -->
    </div><!-- /.container -->
    @endif
  
  {{Form::open(['route' => 'user.update', 'files'=>true, $user->id])}}
  @error('name')
    <p class='alert alert-warning'>{{ $message }}</p>
  @enderror 
    <div class="form-group mb-4">
      {{ Form::label('name', '氏名(ニックネーム可)') }}
      {{ Form::text('name', $user->name, ['class' => 'form-control']) }}
    </div><!-- /.form-group -->
  @error('email')
    <p class='alert alert-warning'>{{ $message }}</p>
  @enderror
    <div class="form-group mb-4">
      {{Form::label('email', 'メールアドレス')}}
      {{Form::text('email', $user->email, ['class' => 'form-control'])}}
    </div><!-- /.form-group -->
  @error('new-password')
    <p class='alert alert-warning'>{{ $message }}</p>
  @enderror
    <div class="form-group mb-4">
      {{Form::label('password', '新しいパスワード')}}
      {{Form::text('new-password', null, ['class' => 'form-control'])}}
    </div><!-- /.form-group -->
    @error('new-password_confirmation')
    <p class='alert alert-warning'>{{ $message }}</p>
    @enderror
    <div class="form-group mb-4">
      {{Form::label('password', '新しいパスワード（確認）')}}
      {{Form::text('new-password_confirmation', null, ['class' => 'form-control'])}}
    </div><!-- /.form-group -->
    <div class="form-group mb-5">
      <p>アイコン画像を選択する</p>
      {{Form::file('user_file')}}
    </div><!-- /.form-group -->
    <div class="form-group mb-4">
      {{Form::submit('更新する', ['class' => 'btn btn-outline-dark pe-5 ps-5'])}}
    </div><!-- /.form-group -->
  {{Form::close()}}
  <div class="mt-4 mb-5">
    <a href={{route('user.setting')}} class='tag2 ms-3'>マイページに戻る</a>
  </div>
@endsection