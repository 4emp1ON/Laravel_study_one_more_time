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
        @if (session()->has('msg'))
            <div class="alert alert-success" role="alert">
                {{ session('msg') }}
            </div>
        @endif
        @yield('content')
    </div>
    <x-footer/>
</div>
@yield('script')
<script>
    const el = document.querySelector('.alert');
    if (el)
    {
        setTimeout(hideAlert, 2000);
    }

    function hideAlert() {
        const el = document.querySelector('.alert');
        el.remove();
    }
</script>
</body>
</html>
