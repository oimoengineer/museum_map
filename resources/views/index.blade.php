@extends('layout')

@section('content')
<div class="position-relative">
  <form action="{{url('/search')}}" method="post" class="ms-auto p-2 bd-highlight position-absolute end-0">
      {{ csrf_field()}}
      {{method_field('get')}}
      <div class="d-flex">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="美術館・博物館・ギャラリー名を入力" name="name">
      </div>
      <button type="submit" class='btn btn-dark ms-3 align-self-end'>検索</button>
    </div><!-- /.d-flex -->
  </form>
</div><!-- /.position-relative -->
  <div class="mb-4 bd-highlight">
    <div class="d-flex">
      <h2 class='p-2 bd-highlight text-dark'>おすすめ一覧</h2>
      <div class="d-flex">
        <ul class='nav p-2 bd-highlight fs-5 mt-2 ms-3'>
          <li class='nav-item'><a class='text-decoration-none me-3' href="#m1">美術館</a></li>
          <li class='nav-item'><a class='text-decoration-none me-3' href="#m2">博物館</a></li>
          <li class='nav-item'><a class='text-decoration-none' href="#m3">ギャラリー</a></li>
        </ul> 
    </div><!-- /.d-flex -->
  </div><!-- /.d-flex -->
  
  <!-- 美術館 -->
  <p id='m1' class='border-start border-dark border-4 fs-4 ps-3 text-dark mt-4'>美術館</p>
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
          <span>住所</span><br>
          {{ $museum->address }}</p>
          <p class="card-text"><span>投稿者</span>{{ $museum->user->name }}</p>
        <p class="card-text"><span>カテゴリ</span>{{ $museum->category->name }}</p>
        <a href={{ route('museum.detail', ['id' => $museum->id]) }} class="btn btn-primary">詳細を見る</a>
      </div>
      </div><!-- /.col-sm-6 -->
    </div>
    @endif
    @endforeach
</div><!-- /.row -->

<!-- 博物館 -->
<p id='m2' class='border-start border-dark border-4 fs-4 ps-3 text-dark mt-5'>博物館</p>
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
        <span>住所</span><br>
          {{ $museum->address }}</p>
          <p class="card-text"><span>投稿者</span>{{ $museum->user->name }}</p>
        <p class="card-text"><span>カテゴリ</span>{{ $museum->category->name }}</p>
        <a href={{ route('museum.detail', ['id' => $museum->id]) }} class="btn btn-primary">詳細を見る</a>
      </div>
      </div><!-- /.col-sm-6 -->
    </div>
    @endif
    @endforeach
</div><!-- /.row -->
  
<!-- ギャラリー -->
<p id='m3' class='border-start border-dark border-4 fs-4 ps-3 text-dark mt-5'>ギャラリー</p>
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
        <span>住所</span><br>
          {{ $museum->address }}</p>
          <p class="card-text"><span>投稿者</span>{{ $museum->user->name }}</p>
        <p class="card-text"><span>カテゴリ</span>{{ $museum->category->name }}</p>
        <a href={{ route('museum.detail', ['id' => $museum->id]) }} class="btn btn-outline-dark">詳細を見る</a>
      </div>
      </div><!-- /.col-sm-6 -->
    </div>
    @endif
    @endforeach
</div><!-- /.row -->
@endsection