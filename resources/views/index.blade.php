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
    <h2 class='p-2 bd-highlight text-dark'>おすすめ一覧</h2>
  
  <div class="row">
    @foreach ($museums as $museum)
      <div class="col-sm-4">
      @if($museum->category_id === 1) 
        <div style="background-color:#ffff7f; width: auto; height: 8%;">
        </div><!-- /.color -->
      @elseif ($museum->category_id === 2)
      <div class="color" style="background-color:grey; width: auto; height: 8%;">
      </div><!-- /.color -->
      @else ($museum->category_id === 3)
      <div class="color" style="background-color:grey; width: auto; height: 8%;">
      </div><!-- /.color -->
      @endif
      <div class="card mb-4">
      <div class="card-body">
        <h4 class="card-title">{{ $museum->name }}</h4>
        <p class="card-text">
          <span>住所</span><br>
          {{ $museum->address }}</p>
          <p class="card-text"><span>投稿者</span>{{ $museum->user->name }}</p>
        <a href={{ route('museum.detail', ['id' => $museum->id]) }} class="">詳細を見る</a>
      </div>
      </div><!-- /.col-sm-6 -->
    </div>
    @endforeach
    {{ $data->links() }}
</div><!-- /.row -->
</div><!-- /.row -->
@endsection