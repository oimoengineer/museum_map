@extends('layout')

@section('content')
  <div class="mt-2 mb-2 d-flex">
    <h2>おすすめ一覧</h2>
    <ul class='nav justify-content-end fs-5 mt-2'>
      <li class='nav-item'><a class='text-decoration-none me-3 ms-5' href="#">美術館</a></li>
      <li class='nav-item'><a class='text-decoration-none me-3' href="#">博物館</a></li>
      <li class='nav-item'><a class='text-decoration-none' href="#">ギャラリー</a></li>
    </ul>
    
  </div><!-- /.d-flex -->

  <div class="row">
    @foreach ($museums as $museum)
  <div class="col-sm-4">
  <div class="card">
  <img src="https://picsum.photos/50/50" class="card-img-top" alt="dummy-img">
  <div class="card-body">
    <h5 class="card-title">{{ $museum->name }}</h5>
    <p class="card-text">
      住所：{{ $museum->address }}</p>
      <p class="card-text">投稿者：{{ $museum->user->name }}</p>
    <p class="card-text">カテゴリ：{{ $museum->category->name }}</p>
    <a href={{ route('museum.detail', ['id' => $museum->id]) }} class="btn btn-primary">詳細を見る</a>
  </div>
  </div><!-- /.col-sm-6 -->
</div>
@endforeach
</div><!-- /.d-flex -->

  
@endsection