<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Humble's Cook's</title>
  <!-- Font Awesome -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    rel="stylesheet"/>
    <!-- Google Fonts -->
    <link
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
    rel="stylesheet"/>
    <!-- MDB -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css"
    rel="stylesheet"/>
    <!-- MDB -->
  <!-- MDB -->
  <script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"></script>
</head>


<style>

:root{
    background-image: url("{{ asset('css/bgLogin.png') }}");
    background-repeat: no-repeat;
    background-size: cover ;
    background-attachment: fixed;
    position: relative;
    width: 100%;
    height: 100% ;
  }
  
  .main-bg {
    background: var(--main-bg) !important;
  }
  .logo{
    background-image: url("{{ asset('css/logo.png') }}");
    width: 579px;
    height: 131px;
    left: 83px;
    top: 401px;

  }
  </style>

<body class="main-bg">
  <!-- Section: Design Block -->
  
<!-- Section: Design Block -->
<section >
  

  

  <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5 "  >
    <div class="row gx-lg-5 align-items-center mb-5">
      <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
        <<div class="logo">
          <img src="logo.png" class="rounded float-start" alt="">
          </div>
      </div>

      <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
        <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
        <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

        <div class="card bg-glass">
          <div class="card-body px-4 py-5 px-md-5">

             <form class="form" method="post" action="{{ route('login')}}">
            @csrf
            <div class="mb-4">
              <x-input-label for="email" class="form-label" :value="__('Email')">
                Username/Email
              </x-input-label>
              <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
              <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <div class="mb-4">
              <x-input-label for="password" class="form-label" :value="__('Password')">
                Password
              </x-input-label>
              <input type="password" class="form-control" id="password" name="password" required autocomplete="current-password" />
              <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            <div class="mb-4">
              <input type="checkbox" class="" id="remember_me" />
              <label for="remember_me" class="form-label">Remember Me</label>
            </div>
            <div class="d-grid">
              <button type="submit" class="p-3 mb-2 bg-primary text-white">Login</button>
            </div>
            @if (Route::has('password.request'))
              <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" 
                href="{{ route('password.request') }}">
                {{__('Forgot your password?') }}
              </a>
            @endif
            <a href="{{ route('register') }}"><p class="underline-text">Belum punya akun?, daftar disini</p></a>
            </form>
          </div>
        </div>
      </div>
    </div>
</section>
<!-- Section: Design Block -->
</body>
</html>