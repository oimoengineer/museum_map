@extends('layout')

@section('content')
  <h1>新規投稿</h1>
  <p class="fs-5">おすすめの美術館を追加する</p>
  {{Form::open(['route' => 'museum.store','files' => true])}}
    <div class="form-select mb-4">
      {{ Form::label('category_id', 'カテゴリ') }}
      {{ Form::select('category_id', $categories, ['class' => 'form-select']) }}
    </div><!-- /.form-group -->
    @error('name')
    <p class='alert alert-warning'>{{ $message }}</p>
    @enderror
    <div class="form-group mb-4">
      {{Form::label('name', '施設名')}}
      {{Form::text('name', old('name'), ['class' => 'form-control'])}}
    </div><!-- /.form-group -->
    @error('address')
    <p class='alert alert-warning'>{{ $message }}</p>
    @enderror
    <div class="form-group mb-4">
      {{Form::label('address', '住所')}}
      {{Form::text('address', old('address'), ['class' => 'form-control'])}}
    </div><!-- /.form-group -->
    <div class="form-group mb-4">
      {{Form::label('museum_url', 'URL')}}
      {{Form::text('museum_url', old('museum_url'), ['class' => 'form-control'])}}
    </div><!-- /.form-group -->
    @error('comment')
    <p class='alert alert-warning'>{{ $message }}</p>
    @enderror 
    <div class="form-group mb-4">
      {{Form::label('comment', 'コメント(おすすめポイントなど)')}}
      {{Form::textarea('comment', old('comment'), ['class' => 'form-control'])}}
    </div><!-- /.form-group -->
    @error('thefile')
    <p class='alert alert-warning'>{{ $message }}</p>
    @enderror 
    <div class="form-group mb-4">
      <p>美術館・博物館・ギャラリーの画像をアップロードしてください。</p>
      {{Form::file('thefile')}}
    </div><!-- /.form-group -->
    <div class="form-group mb-3">
      {{Form::submit('追加する', ['class' => 'btn btn-outline-dark pe-5 ps-5'])}}
    </div><!-- /.form-group -->
    <div class="mb-4">
      <a href={{route('museum.list')}} class='tag2 ms-4'>一覧に戻る</a>
    </div>
    {{Form::close()}}
@endsection
