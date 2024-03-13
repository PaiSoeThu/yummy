<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <style>
        .item1 {
  grid-column: 1 / span 2;
  grid-row: 1;
}

.item2 {
  grid-column: 3;
  grid-row: 1 / span 2;
}

.item5 {
  grid-column: 1 / span 3;
  grid-row: 3;
}
    </style>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app" class="min-vh-100 d-flex flex-column">
       @include('layouts.nav')

  

    
       <main class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-9"> @yield('content')</div>
                <div class="col-lg-3">@include('layouts.right-sidebar')</div>
             </div>
         </div>  
     </main>
    

    <footer class="text-center text-white mt-auto bg-body-tertiary">
        <p class="p-3 m-0 text-primary-emphasis">Since 2024</p>
</footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
