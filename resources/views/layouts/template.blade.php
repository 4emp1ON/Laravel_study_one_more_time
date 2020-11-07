<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>@section('title')@show</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
<div class="wrapper">
    <x-header/>
    <div class="container mt-3 mb-3">
        @yield('content')
    </div>
    <x-footer/>
</div>
@yield('script')
</body>
</html>
