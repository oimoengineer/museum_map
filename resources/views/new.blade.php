@extends('layout')

@section('content')
  <h1>新規投稿</h1>
  <p class="fs-5">おすすめの美術館を追加する</p>
  {{Form::open(['route' => 'museum.store'])}}
    <div class="form-group mb-4">
      {{ Form::label('category_id', 'カテゴリ') }}
      {{ Form::select('category_id', $categories, ['class' => 'form-select']) }}
    </div><!-- /.form-group -->
    <div class="form-group mb-4">
      {{Form::label('name', '施設名')}}
      {{Form::text('name', null, ['class' => 'form-control'])}}
    </div><!-- /.form-group -->
    <div class="form-group mb-4">
      {{Form::label('address', '住所')}}
      {{Form::text('address', null, ['class' => 'form-control'])}}
    </div><!-- /.form-group -->
    <div class="form-group mb-4">
      {{Form::label('comment', 'コメント(おすすめポイントなど)')}}
      {{Form::textarea('comment', null, ['class' => 'form-control'])}}
    </div><!-- /.form-group -->
    <div class="form-group mb-4">
      {{Form::submit('追加する', ['class' => 'btn btn-outline-dark pe-5 ps-5'])}}
    </div><!-- /.form-group -->
  {{Form::close()}}

  <div class="mt-4 mb-5">
    <a href={{route('museum.list')}}>一覧に戻る</a>
  </div>
@endsection