<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <title>@yield('title')</title>
    <script src="/js/jquery.js"></script>
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="/">Главная</a>            
            <div class="collapse navbar-collapse" id="navbarText">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="/products">Продукты</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/dishes">Блюда</a>
                </li>
              </ul>              
            </div>
          </nav>
        @yield('content')
    </div>
    <script src="/js/bootstrap.js"></script>
</body>
</html>