@extends('layout')

@section('content')
<div class="card">
  <div class="card-body">
  <h1 class='mb-4'>マイページ</h1>
  <div>
    <p>氏名(ニックネーム可)</p>
    <p class='border border-dark p-2 mb-4 rounded'>{{$users->name}}</p>
    <p>メールアドレス</p>
    <p class='border border-dark p-2 mb-4 rounded'>{{$users->email}}</p>
  </div>
  <div class="mt-4 d-flex justify-content-between">
    <p><a href={{route('museum.list')}} class='tag2'>一覧に戻る</a> |
    <a href={{route('user.edit')}} class='tag2'>編集</a></p>
    {{ Form::open(['method' => 'delete', 'route' => ['user.destroy']]) }}
        {{ Form::submit('削除', ['class' => 'btn btn-outline-danger']) }}
    {{ Form::close() }}
  </div>
  </div><!-- /.card-body -->
  </div><!-- /.card -->
@endsection