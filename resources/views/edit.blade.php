@extends('layout')

@section('content')
  <h1>「{{$museum->name}}」の投稿内容を編集する</h1>
  {{ Form::model($museum, ['route' => ['museum.update', $museum->id]]) }}
    <div class="form-group mb-4 mt-4">
      {{ Form::label('category_id', 'カテゴリ') }}
      {{ Form::select('category_id', $categories) }}
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
      {{Form::label('museum_url', 'URL')}}
      {{Form::text('museum_url', null, ['class' => 'form-control'])}}
    </div><!-- /.form-group -->
    <div class="form-group mb-4">
      {{Form::label('comment', 'コメント(おすすめポイントなど)')}}
      {{Form::textarea('comment', null, ['class' => 'form-control'])}}
    </div><!-- /.form-group -->
    <div class="form-group mb-4">
      {{Form::submit('更新する', ['class' => 'btn btn-outline-dark pe-5 ps-5'])}}
    </div><!-- /.form-group -->
  {{Form::close()}}

  <div class=mb-5>
    <a href={{route('museum.list')}}>一覧に戻る</a>
  </div>
@endsection