@extends('layout')

@section('content')
  <div class="d-flex">
  <h1 class="mb-4">{{$museum->name}}</h1>
  <a href="">お気に入り登録</a>
  </div><!-- /.d-flex -->

  <div class="row">
  <div class="d-flex museum_img justify-content-between">
    @if($museum->museum_image == null) 
    <img src="{{ asset('images/no_img_big.png')}}" alt="no-image" class="img-fluid col-md-6">
    @else
    <img src="{{ asset('/storage/'.$museum->museum_image)}}" alt="museum-img" class="img-fluid col-md-4">
    @endif
  <div class="show_box col-md-3">
    <p><span class='fw-bold'>カテゴリ</span><br>
    {{$museum->category->name}}</p>
    <p class="mt-1"><span class='fw-bold'>URL</span>
    <br>{{$museum->address}}</p>
    <p class="mt-1"><span class='fw-bold'>住所</span>
    <br>{{$museum->address}}</p>
    <div id='map'>
    </div>
    <script src="{{ asset('/js/result.js')}}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JPkey=AIzaSyBIceH7-qsqc89r2ebp7754w9Ip1QeLyPM&callback=initMap" async defer></script>
  </div>
  </div><!-- /.d-flex -->
  </div><!-- /.row -->
  
  <div class="d-flex comment mt-3">
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