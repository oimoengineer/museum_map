<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <link rel="stylesheet" href="{{asset('/css/style.css')}}">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
  <title>Museum Nav</title>
  
</head>
<body class='main'>
            <div class="container d-flex" id="welcome">
                <div class="content">
                    <p>おすすめの美術館をシェアしよう</p>
                    <h1>Museum Nav</h1>
                    <div class="d-flex flex-column text-center">
                    <a href="{{route('register')}}" class='btn btn-outline-dark mb-3'>はじめての方はこちら</a>
                    <a href="{{route('login')}}" class='tag'>ログインはこちら</a>
                    </div><!-- /.d-flex -->
                </div><!-- /.content -->
                <div class="key_visual">
                    <img src="{{asset('/storage/image/key_visual.png')}}" alt="メイン画像">
                </div><!-- /.key_visual -->
            </div><!-- /.d-flex -->

</body>
</html>
