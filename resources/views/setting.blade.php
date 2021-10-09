@extends('layout')

@section('content')
  <h1 class='mb-4'>マイページ</h1>
  <div class="d-flex">
    <div class='me-4'>
      <img src="" alt="user-img" class='rounded-circle w-75'>
    </div>
    <div class='flex-shrink-1'>
    <p>氏名(ニックネーム可)</p>
    <p class='border border-dark p-2 mb-4 rounded'>{{$users->name}}</p>
    <p>メールアドレス</p>
    <p class='border border-dark p-2 mb-4 rounded'>{{$users->email}}</p>
    <p>パスワード</p>
    <p class='border border-dark p-2 mb-4 rounded'>{{$users->password}}</p>
    </div>
  </div><!-- /.d-flex -->
  <div class="mt-4 mb-5">
    <a href={{route('user.edit')}}>編集する</a>
    <a href={{route('museum.list')}}>一覧に戻る</a>
  </div>
@endsection