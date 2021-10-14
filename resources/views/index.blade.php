@extends('layout')

@section('content')
<div class="position-relative search">
  <form action="{{url('/search')}}" method="post" class="ms-auto p-2 bd-highlight position-absolute end-0">
      {{ csrf_field()}}
      {{method_field('get')}}
      <div class="d-flex">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="施設名を入力" name="name">
      </div>
      <button type="submit" class='btn btn-dark ms-3 align-self-end'>検索</button>
    </div><!-- /.d-flex -->
  </form>
</div><!-- /.position-relative -->
<div class="mb-4">
    <h2 class='p-2 bd-highlight text-dark'>おすすめ一覧</h2>
<div class="row">
@foreach ($museums as $museum)
<div class="col-sm-4">
<div class="card mb-4">
  <div class="card-body">
    <div class="d-flex justify-content-between mb-2">
  <h4 class="card-title align-self-center">{{ $museum->name }}</h4>
@if ($museum->category_id === 1)
  <img src="{{ asset('images/M_image.png')}}" alt="" style="width:20%; height:20%;">
@elseif ($museum->category_id === 2)
  <img src="{{ asset('images/H_image.png')}}" alt="" style="width:18%; height:18%;">
@else
<img src="{{ asset('images/G_image.png')}}" alt="" style="width:20%; height:20%;">
@endif
</div><!-- /.d-flex -->  
  <p class="card-text" style="text-align: left;">
    <span>住所</span><br>
    {{ $museum->address }}</p>
    @if(empty($museum->user->name))
    <p class="card-text" style="text-align: left;"><span>投稿者</span><br>退会したユーザー</p>
    @else
    <p class="card-text" style="text-align: left;"><span>投稿者</span><br>{{ $museum->user->name }}</p>
    @endif
  <a href={{ route('museum.detail', ['id' => $museum->id]) }}  class='tag2'>詳細を見る</a>
</div>
</div><!-- /.col-sm-6 -->
</div>
@endforeach
  

    {{ $museums->links() }}
</div><!-- /.row -->
</div><!-- /.row -->
@endsection