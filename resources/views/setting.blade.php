@extends('layout')

@section('content')
  <h1>マイページ</h1>
  {{Form::open(['route' => 'museum.store', 'files'=>true])}}
    <div class="form-group mb-4">
      {{ Form::label('name', '氏名') }}
      {{ Form::select('name', $users, ['class' => 'form-control']) }}
    </div><!-- /.form-group -->
    <div class="form-group mb-4">
      {{Form::label('email', 'メールアドレス')}}
      {{Form::text('email', ['class' => 'form-control'])}}
    </div><!-- /.form-group -->
    <div class="form-group mb-4">
      {{Form::label('password', 'パスワード')}}
      {{Form::text('password', ['class' => 'form-control'])}}
    </div><!-- /.form-group -->
  {{Form::close()}}

  <div class="mt-4 mb-5">
    <a href={{route('museum.list')}}>一覧に戻る</a>
  </div>
@endsection