@extends('layout')

@section('content')
  <h1 class='mb-4'>マイページ</h1>
  <div class="d-flex">
    <div class='flex-shrink-1'>
    <p>氏名(ニックネーム可)</p>
    <p class='border border-dark p-2 mb-4 rounded'>{{$users->name}}</p>
    <p>メールアドレス</p>
    <p class='border border-dark p-2 mb-4 rounded'>{{$users->email}}</p>
    </div>
  </div><!-- /.d-flex -->
  <div class="like-list">
    <h3>いいね一覧</h3>
  </div><!-- /.like -->
  <class="mt-4 mb-5 d-flex">
    <a href={{route('museum.list')}}>一覧に戻る</a>
    <a href={{route('user.edit')}}>編集する</a>
    {{ Form::open(['method' => 'delete', 'route' => ['user.destroy']]) }}
        {{ Form::submit('削除', ['class' => 'btn btn-danger']) }}
    {{ Form::close() }}
  </div>
@endsection