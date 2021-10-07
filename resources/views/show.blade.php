@extends('layout')

@section('content')
  <h1 class="mb-4">{{$museum->name}}</h1>
  
  <div class="d-flex museum_img justify-content-between">
    @if($museum->museum_image == null) 
    <img src="{{ asset('images/no_img_big.png')}}" alt="no-image" class="img-fluid">
    @else
    <img src="{{ asset('/storage/'.$museum->museum_image)}}" alt="museum-img" class="img-fluid">
    @endif
  <div class="show_box">
    <p><span class='fw-bold'>カテゴリ</span><br>
    {{$museum->category->name}}</p>
    <p class="mt-1"><span class='fw-bold'>住所</span>
    <br>{{$museum->address}}</p>
    <p class="mt-1"><span class='fw-bold'>URL</span>
    <br>{{$museum->address}}</p>
    <iframe id='map'
    src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=AIzaSyCFZCHaIiCNwLYmESowh8759qvh18kgV8M&q={{ $museum->address }}" 
    width='100%'
    height='280'
    frameborder='0'>
    </iframe>
  </div>
  </div><!-- /.d-flex -->
  

  <p class="ms-2 mt-4"><span class='fw-bold'>コメント</span><br></p>
  <div class="d-flex comment">
    <img src="{{asset('/images/user_dummy.jpeg')}}" alt="user_img" class='me-4 ms-2 mt-2'>
    <div class="balloon">
      <p>{{$museum->comment}}</p>
    </div><!-- /.balloon -->
  </div><!-- /.comment -->
  <div class="d-flex justify-content-between">
    <p class="me-2 mt-2 fs-5">
    <a href={{route('museum.list')}}>一覧に戻る</a>
    @auth
      @if($museum->user_id === $login_user_id)
      | <a href={{route('museum.edit', ['id' => $museum->id]) }}>編集</a>
    </p>
    {{ Form::open(['method' => 'delete', 'route' => ['museum.destroy', $museum->id]]) }}
        {{ Form::submit('削除', ['class' => 'btn btn-outline-danger']) }}
    {{ Form::close() }}
      @endif
    @endauth
  </div>
@endsection