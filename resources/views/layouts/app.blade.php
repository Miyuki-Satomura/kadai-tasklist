<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <!-- IE後方互換と表示領域の設定
        表示領域 (viewport) の設定をしっかりしておかないと、レスポンシブデザインにはならず、iPhone などのスマホデバイスで見た時に文字が小さく表示されます。-->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        
        <title>Tasklist</title>
        
        <!-- Bootstrap の読み込み -->
          <!-- Bootstrap CSS-->
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
          <!-- jQuery -->
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
          <!-- Bootstrap JavaScript-->
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    
    <body>
        <!-- Bootstrap 7.4-->
        @include('commons.navbar')
        
        <div class="container">
          @include('commons.error_messages')
        
          @yield('content')
        </div>  
    </body>
</html>