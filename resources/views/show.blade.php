@extends('layout')

@section('content')
  <h1 class="mb-4">{{$museum->name}}</h1>
  <div class="ms-2 fs-5">
    <p>カテゴリ：{{$museum->category->name}}</p>
    <p class="mt-1">住所：{{$museum->address}}</p>
  </div>

  <iframe id='map'
  src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=AIzaSyCFZCHaIiCNwLYmESowh8759qvh18kgV8M&q={{ $museum->address }}" 
  width='100%'
  height='320'
  frameborder='0'>
</iframe>
  <p class="fs-5 ms-2 mt-4">コメント<br>
  {{$museum->comment}}
  </p>
  <div class="d-flex justify-content-between">
    <p class="me-2 mt-2 fs-5">
    <a href={{route('museum.list')}}>一覧に戻る</a>
      | <a href={{route('museum.edit', ['id' => $museum->id]) }}>編集</a>
    </p>
    {{ Form::open(['method' => 'delete', 'route' => ['museum.destroy', $museum->id]]) }}
        {{ Form::submit('削除', ['class' => 'btn btn-outline-danger']) }}
    {{ Form::close() }}
  </div>
@endsection