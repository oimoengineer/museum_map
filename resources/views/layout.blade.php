<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <title>Museum Map</title>
  <style>body {padding-top: 80px}</style>
</head>
<body>
  <nav class="navbar navbar-extend-md navbar-dark bg-primary fixed-top">
    <a class="navbar-brand" href={{route('museum.list')}}>Museum Map</a>
  </nav>
  <div class="container">
    @yield ('content')
  </div><!-- /.container -->
</body>
</html>