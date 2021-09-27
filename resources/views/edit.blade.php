@extends('layout')

@section('content')
  <h1>「{{$museum->name}}」の投稿内容を編集する</h1>
  {{ Form::model($museum, ['route' => ['museum.update', $museum->id]]) }}
    <div class="form-group">
      {{Form::label('name', '施設名:')}}
      {{Form::text('name', null)}}
    </div><!-- /.form-group -->
    <div class="form-group">
      {{Form::label('address', '住所:')}}
      {{Form::text('address', null)}}
    </div><!-- /.form-group -->
    <div class="form-group">
      {{ Form::label('category_id', 'カテゴリ:') }}
      {{ Form::select('category_id', $categories) }}
    </div><!-- /.form-group -->
    <div class="form-group">
      {{Form::submit('更新する', ['class' => 'btn btn-primary'])}}
    </div><!-- /.form-group -->
  {{Form::close()}}

  <div>
    <a href={{route('museum.list')}}>一覧に戻る</a>
  </div>
@endsection