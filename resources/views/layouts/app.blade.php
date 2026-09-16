<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!--Isi title yang kita kirimkn dari views lain-->
    <title>@yield('title')</title>
    <!--memanggil link bootstraps-->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    
<div class="container">

    @if(session('success'))
        <div class="alert alert-primary">
            {{ session('success') }}
        </div>
    @endif

    @yield('content')

</div>

</body>
</html>