<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
     <!-- Favicon-->
     <link rel="icon" type="image/x-icon" href="{{ asset('blog/assets/favicon.ico') }}" />
     <!-- Core theme CSS (includes Bootstrap)-->
     {{-- <link href="{{ asset('blog/css/styles.css') }}" rel="stylesheet" /> --}}

    <script src="{{ mix('js/app.js') }}" defer></script>
    <title>Laravel Blog - @yield('title')</title>
</head>
<body>
  
      <!-- Responsive navbar-->
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home.index') }}">Laravel App</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('home.index') }}">Blog Posts</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('home.contact') }}">Contact</a></li>
                    <li class="nav-item"><a class="nav-link"  href="{{ route('posts.create') }}">Add Post</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

     <!-- Footer-->
     <footer class="py-5 bg-dark">
      <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2022</p></div>
  </footer>
  <!-- Bootstrap core JS-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Core theme JS-->
  <script src="{{ asset('blog/js/scripts.js') }}"></script>
</body>
</html>