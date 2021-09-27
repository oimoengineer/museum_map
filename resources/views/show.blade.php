@extends('layout')

@section('content')
  <h1>{{$museum->name}}</h1>
  <div>
    <p>{{$museum->category->name}}</p>
    <p>{{$museum->address}}</p>
  </div>

  <iframe id='map'
  src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=AIzaSyCFZCHaIiCNwLYmESowh8759qvh18kgV8M&q={{ $museum->address }}" 
  width='100%'
  height='320'
  frameborder='0'>
</iframe>

  <div>
    <a href={{route('museum.list')}}>一覧に戻る</a>
      | <a href={{route('museum.edit', ['id' => $museum->id]) }}>編集</a>
    <p></p>
    {{ Form::open(['method' => 'delete', 'route' => ['museum.destroy', $museum->id]]) }}
        {{ Form::submit('削除', ['class' => 'btn btn-outline-danger']) }}
    {{ Form::close() }}
  </div>
@endsection