@extends('layout')

@section('content')
  <div class="mt-2 mb-2 d-flex justify-content-between">
    <h1>美術館一覧</h1>
    @auth
    <div>
      <a href={{ route('museum.new') }} class='btn btn-outline-primary'>美術館を追加する</a>
    </div>
    @endauth
  </div><!-- /.d-flex -->
  <p class="fs-5 mb-4">
    みんなのおすすめ美術館一覧です。施設名をクリックすると詳細情報を見ることが出来ます。
  </p>
  <table class="table table-hover fs-5">
    <tr>
      <th class="table-success">カテゴリ</th><th class="table-success">施設名</th><th class="table-success">住所</th>
    </tr>
    @foreach ($museums as $museum)
      <tr>
        <td>{{ $museum->category->name }}</td>
        <td>
          <a href={{ route('museum.detail', ['id' => $museum->id]) }}>
          {{ $museum->name }}
          </a>
        </td>
        <td>{{ $museum->address }}</td>
      </tr>
    @endforeach
  </table>

  
@endsection