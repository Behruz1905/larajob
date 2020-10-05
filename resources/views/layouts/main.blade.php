<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('../partials.head')
</head>
<body>
    <div id="app">


    @include('../partials.nav')
    <main class="py-4">
    @yield('content')
    </main>

    @include('../partials.footer')
    </div>
</body>
</html>