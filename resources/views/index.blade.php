@extends('layout')

@section('content')
  <div class="mt-2 mb-2 d-flex">
    <h2>おすすめ一覧</h2>
    <ul class='nav justify-content-end fs-5 mt-2'>
      <li class='nav-item'><a class='text-decoration-none me-3 ms-5' href="#m1">美術館</a></li>
      <li class='nav-item'><a class='text-decoration-none me-3' href="#m2">博物館</a></li>
      <li class='nav-item'><a class='text-decoration-none' href="#m3">ギャラリー</a></li>
    </ul> 
  </div><!-- /.d-flex -->
  
  <!-- 美術館 -->
  <p id='m1'>美術館</p>
  <div class="row">
    @foreach ($museums as $museum)
    @if($museum->category_id === 1)
      <div class="col-sm-4">
      <div class="card">
      @if($museum->museum_image == null) 
      <img src="{{ asset('images/no_image.jpg')}}" alt="no-image">
      @else
      <img src="{{ asset('/storage/'.$museum->museum_image)}}" class="card-img-top" alt="museum-img">
      @endif
      <div class="card-body">
        <h5 class="card-title">{{ $museum->name }}</h5>
        <p class="card-text">
          住所<br>
          {{ $museum->address }}</p>
          <p class="card-text">投稿者：{{ $museum->user->name }}</p>
        <p class="card-text">カテゴリ：{{ $museum->category->name }}</p>
        <a href={{ route('museum.detail', ['id' => $museum->id]) }} class="btn btn-primary">詳細を見る</a>
      </div>
      </div><!-- /.col-sm-6 -->
    </div>
    @endif
    @endforeach
</div><!-- /.row -->

<!-- 博物館 -->
<p id='m2'>博物館</p>
  <div class="row">
    @foreach ($museums as $museum)
    @if($museum->category_id === 2)
    <!-- 美術館 -->
      <div class="col-sm-4">
      <div class="card">
      @if($museum->museum_image == null) 
      <img src="{{ asset('images/no_image.jpg')}}" alt="no-image">
      @else
      <img src="{{ asset('/storage/'.$museum->museum_image)}}" class="card-img-top" alt="museum-img">
      @endif
      <div class="card-body">
        <h5 class="card-title">{{ $museum->name }}</h5>
        <p class="card-text">
          住所<br>
          {{ $museum->address }}</p>
          <p class="card-text">投稿者：{{ $museum->user->name }}</p>
        <p class="card-text">カテゴリ：{{ $museum->category->name }}</p>
        <a href={{ route('museum.detail', ['id' => $museum->id]) }} class="btn btn-primary">詳細を見る</a>
      </div>
      </div><!-- /.col-sm-6 -->
    </div>
    @endif
    @endforeach
</div><!-- /.row -->
  
<!-- ギャラリー -->
<p id='m3'>ギャラリー</p>
  <div class="row">
    @foreach ($museums as $museum)
    @if($museum->category_id === 3)
    <!-- 美術館 -->
      <div class="col-sm-4">
      <div class="card">
      @if($museum->museum_image == null) 
      <img src="{{ asset('images/no_image.jpg')}}" alt="no-image">
      @else
      <img src="{{ asset('/storage/'.$museum->museum_image)}}" class="card-img-top" alt="museum-img">
      @endif
      <div class="card-body">
        <h5 class="card-title">{{ $museum->name }}</h5>
        <p class="card-text">
          住所<br>
          {{ $museum->address }}</p>
          <p class="card-text">投稿者：{{ $museum->user->name }}</p>
        <p class="card-text">カテゴリ：{{ $museum->category->name }}</p>
        <a href={{ route('museum.detail', ['id' => $museum->id]) }} class="btn btn-primary">詳細を見る</a>
      </div>
      </div><!-- /.col-sm-6 -->
    </div>
    @endif
    @endforeach
</div><!-- /.row -->
@endsection