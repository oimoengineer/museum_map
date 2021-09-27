@extends('layout')

@section('content')
  <h1>美術館一覧</h1>

  <table class="table table-hover">
    <tr>
      <th class="table-primary">カテゴリ</th><th class="table-primary">施設名</th><th class="table-primary">住所</th>
    </tr>
    @foreach ($museums as $museum)
      <tr>
        <td>{{$museum->category->name}}</td>
        <td>
          <a href={{route('museum.detail', ['id' => $museum->id])}}>
          {{$museum->name}}
          </a>
        </td>
        <td>{{$museum->address}}</td>
      </tr>
    @endforeach
  </table>
@endsection