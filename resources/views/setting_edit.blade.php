@extends('layout')

@section('content')
  <h1 class='mb-4'>ユーザー情報編集</h1>
  {{Form::open(['route' => 'user.update', 'files'=>true, $users->id])}}
    <div class="form-group mb-4">
      {{ Form::label('name', '名前') }}
      {{ Form::text('name', $users, ['class' => 'form-control']) }}
    </div><!-- /.form-group -->
    <div class="form-group mb-4">
      {{Form::label('email', 'メールアドレス')}}
      {{Form::text('email', $users, ['class' => 'form-control'])}}
    </div><!-- /.form-group -->
    <div class="form-group mb-4">
      {{Form::label('password', 'パスワード')}}
      {{Form::text('password', $users, ['class' => 'form-control'])}}
    </div><!-- /.form-group -->
    <div class="form-group mb-5">
      <p>新しいアイコン用の画像ファイルを選択してください。</p>
      {{Form::file('thefile')}}
    </div><!-- /.form-group -->
    <div class="form-group mb-4">
      {{Form::submit('更新する', ['class' => 'btn btn-primary pe-5 ps-5'])}}
    </div><!-- /.form-group -->
  {{Form::close()}}
  <div class="mt-4 mb-5">
    <a href={{route('user.setting')}}>マイページに戻る</a>
  </div>
@endsection