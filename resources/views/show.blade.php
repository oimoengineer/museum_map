@extends('layout')

@section('content')
<section class="show">
  <div class="d-flex">
  <h1 class="align-self-center me-2">{{$museum->name}}</h1>
  @if ($museum->category_id === 1)
  <img src="{{ asset('images/M_image.png')}}" alt="" style="width:8%; height:8%;" class='category_img'>
  @elseif ($museum->category_id === 2)
    <img src="{{ asset('images/H_image.png')}}" alt="" style="width:8%; height:8%;">
  @else
  <img src="{{ asset('images/G_image.png')}}" alt="" style="width:8%; height:8%;">
  @endif
  </div><!-- /.d-flex -->
  <div class="row">
    <div class="show_box mt-4">
    <div class="show_content"> 
      <div class="mb-4">
        <div>
          <p><span class='fw-bold'>カテゴリ</span><br>
            {{$museum->category->name}}</p>
          @if ($museum->museum_url == null)
          <p class="mt-1"><span class='fw-bold'>URL</span>
          <br>登録されていません</p>
          @else
          <p class="mt-1"><span class='fw-bold'>URL</span>
          <br><a href="{{$museum->museum_url}}">{{$museum->museum_url}}</a></p>
          @endif
          <p class="mt-1"><span class='fw-bold'>住所</span>
          <br>{{$museum->address}}</p>
        </div>
      </div>
      <div id='map'></div>
        <script src="{{ asset('/js/result.js')}}"></script>
        <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JPkey=AIzaSyBIceH7-qsqc89r2ebp7754w9Ip1QeLyPM&callback=initMap" async defer></script>
        
      </div>
    </div><!-- /.show_content -->
  </div><!-- /.row -->
  
  <div class="d-flex comment mt-4">
    <img src="{{asset('/images/user_image.png')}}" alt="user_img" style="width: 80px; height:70px;" class='me-2'>
    <div class="border border-1 rounded border-dark p-3 mb-4" style="width: 100%;">
      <p>{{$museum->comment}}</p>
    </div><!-- /.balloon -->
  </div><!-- /.comment -->
  <div class="d-flex justify-content-between">
    <p class="me-2 fs-5">
    <a href={{route('museum.list')}} class='tag2 mb-4'>一覧に戻る</a>
    @auth
      @if($museum->user_id === $login_user_id)
      | <a href={{route('museum.edit', ['id' => $museum->id]) }} class='tag2'>編集</a>
    </p>
    {{ Form::open(['method' => 'delete', 'route' => ['museum.destroy', $museum->id]]) }}
        {{ Form::submit('削除', ['class' => 'btn btn-outline-danger']) }}
    {{ Form::close() }}
      @endif
    @endauth
  </div>
  </section><!-- /.show -->
@endsection