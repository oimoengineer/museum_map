@extends('layout')

@section('content')

<section class="show">
  @if (session('success'))
    <div class="alert alert-success">
      {{session('success')}}
    </div><!-- /.alert -->
  @endif
    <h1 class="align-self-center me-2 mb-4">{{$museum->name}}</h1>
    <div class="show_flex">
  @if ($museum->museum_image !== null && $museum->museum_image !== " ")
    <img src="{{asset('image/no_image.jpg')}}" alt="美術館・博物館・ギャラリーの写真">  
  @else
    <img src="{{ asset('image/no_image.jpg')}}" alt="no image"> 
  @endif
    <div class="show_info">
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

  <div class="row">
    <div class="show_box mt-4">
    <div class="show_content"> 
      <div class="mb-4">
      </div>
      
      <!-- google map -->
      <div id='map'></div>
      <script src="{{ asset('/js/result.js')}}"></script>
      <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=AIzaSyAY0m8Vf8BdYO3x0zOBahDR5PSi1D-2sFY&callback=initMap" async defer></script>
      </div><!-- /.row -->
      </div>
    </div><!-- /.show_content -->
  
    <!-- user info -->
  <div class="d-flex comment mt-4">
      @if ($user->user_image !== null && $user->user_image !== " ")
        <img src="{{asset('image/user_image.png')}}" alt="アイコン画像" width="80px" height="70px" class="me-2">
      @else
        <img src="{{asset('image/user_image.png')}}" alt="no image" width="80px" height="70px" class="me-2">
      @endif
    <div class="border border-1 rounded border-dark p-3 mb-4" style="width: 100%;">
      <p>{{$museum->comment}}</p>
    </div><!-- /.balloon -->
  </div><!-- /.comment -->

  <!-- button -->
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
