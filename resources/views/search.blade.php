@extends('layout')

@section('content')
    <h2>検索結果</h2>  
  
  @if(isset($museums))
  <div class="row">
    @foreach ($museums as $museum)
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
    @endforeach
  </div><!-- /.row -->
  @endif
  @if(!empty($message))
  <div class="alert alert-primary" role="alert">{{ $message}}</div>
  @endif

  <a href="{{route('museum.list')}}">一覧に戻る</a>
@endsection