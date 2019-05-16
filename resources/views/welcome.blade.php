<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Bán hàng</title>

        <!-- Fonts -->
        <link href="/css/bootstrap.min.css" rel="stylesheet">
        <link href="/css/app.css" rel="stylesheet">

        <!-- Styles -->
        
    </head>
    <style>
        ul {
          list-style-type: none;
          margin: 0;
          padding: 0;
          overflow: hidden;
          background-color: #333;
          position: sticky;
          top: 0;
        }

        li {
          float: left;
        }

        li a {
          display: block;
          color: white;
          text-align: center;
          padding: 14px 16px;
          text-decoration: none;
        }

        li a:hover {
          background-color: hotpink;
        }
    </style>
    <body>
        <ul>
          <li><a class="active" href="{{route('homepage')}}">Trang chủ</a></li>
          <li><a href="{{route('product.index')}}">Mua ngay thôi!</a></li>
          <li><a href="#contact">Giỏ hàng</a></li>
          <li><a href="#">Thông tin tài khoản của bạn</a></li>
          <li><a href="{{route('user.index')}}">Quản lý tài khoản</a></li>
          <li><a href="{{route('feedback.index')}}">Quản lý phản hồi</a></li>
          <li><a href="#about">Về chúng tôi</a></li>

        </ul>

        <script src="/js/jquery.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <div class="container">
          <div class="row">
            <img src="{{asset('images/164914.jpg')}}" alt="Database" width="100%" height="100%">
          </div>
        </div>
        
        
        <div class="container">
          
          <br>
          <hr>
          <br>
          <div class="row">
            <div class="col-sm-4">
              <p>Một cửa hàng bán khoai lang nướng ở thành phố Sapporo trên đảo Hokkaido đang trở nên nổi tiếng ở Nhật Bản,vì chủ của cửa hàng này là một con chó tên Ken Kun.</p>
            </div>
            <div class="col-sm-8">
              <img src="{{asset('images/164914.jpg')}}" alt="Database" width="100%" height="100%">
            </div>
        </div>
        <hr>
        <button class="btn btn-danger" ><a href="{{route('homepage')}}" style="text-decoration-style: none"> Click Here</a></button>
        <br>
        <hr>
        <br>
      </div>
    </body>
</html>
