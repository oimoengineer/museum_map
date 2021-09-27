@extends('layout')

@section('content')
  <h1>おすすめの美術館を追加する</h1>
  {{Form::open(['route' => 'museum.store'])}}
    <div class="form-group">
      {{Form::label('name', '施設名:')}}
      {{Form::text('name', null)}}
    </div><!-- /.form-group -->
    <div class="form-group">
      {{Form::label('address', '住所:')}}
      {{Form::text('address', null)}}
    </div><!-- /.form-group -->
    <div class="form-group">
      {{Form::label('category_id', 'カテゴリ:')}}
      {{Form::text('category_id', $categories)}}
    </div><!-- /.form-group -->
    <div class="form-group">
      {{Form::submit('作成する', ['class' => 'btn btn_primary'])}}
    </div><!-- /.form-group -->
  {{Form::close()}}
  
  <div>
    <a href={{route('museum.list')}}>一覧に戻る</a>
  </div>
@endsection