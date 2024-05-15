<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
     <title>ArtShop: Official Site</title>
    @vite(['resources/sass/app.scss', 
    'resources/js/app.js', 
    'resources/views/themes/artshop/assets/css/main.css',
    'resources/views/themes/artshop/assets/plugins/jqueryui/jquery-ui.css',
    'resources/views/themes/artshop/assets/js/main.js',
    'resources/views/themes/artshop/assets/plugins/jqueryui/jquery-ui.min.js'])
</head>
<body>
  @include('themes.artshop.shared.header')
  @yield('content')
  @include('themes.artshop.shared.footer')
    
    <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>