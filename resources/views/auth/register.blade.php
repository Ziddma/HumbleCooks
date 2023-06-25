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

  

  <form class="form" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
    @csrf
    <!-- Avatar -->
    <div class="mb-4">
        <x-input-label for="avatar" class="form-label" :value="__('Avatar')" />
        <x-file-input id="avatar" class="form-control" name="avatar" accept="image/*"
            onchange="previewImage(event)" />
        <x-input-error :messages="$errors->get('avatar')" class="mt-2" />
        <!-- Image Preview -->
        <img id="avatar-preview" class="mt-2" style="max-width: 200px; max-height: 200px;"
            src="#" alt="" />
    </div>
    <!-- Name -->
    <div>
        <x-input-label for="name" class="form-label" :value="__('Name')" />
        <x-text-input id="name" class="form-control" type="text" name="name"
            :value="old('name')" required autofocus autocomplete="name" />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>
    <!-- Email Address -->
    <div class="mb-4">
        <x-input-label for="email" class="form-label" :value="__('Email')" />
        <x-text-input id="email" class="form-control" type="email" name="email"
            :value="old('email')" required autocomplete="username" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <!-- Password -->
    <div class="mb-4">
        <x-input-label for="password" class="form-label" :value="__('Password')" />

        <x-text-input id="password" class="form-control" type="password" name="password" required
            autocomplete="new-password" />

        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>
    <!-- Confirm Password -->
    <div class="mb-4">
        <x-input-label for="password_confirmation" class="form-label"
            :value="__('Confirm Password')" />

        <x-text-input id="password_confirmation" class="form-control" type="password"
            name="password_confirmation" required autocomplete="new-password" />

        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
    </div>
    <div class="flex items-center justify-end mt-4">
        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
            href="{{ route('login') }}">
            {{ __('Sudah Mendaftar?') }}
        </a>
        <p></p>
        <div class="d-grid gap-2">
            <x-primary-button class="btn btn-primary">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </div>
</form>
</div>
</div>
</div>
</div>

        <script>
              function previewImage(event) {
              var input = event.target;
              if (input.files && input.files[0]) {
              var reader = new FileReader();
              reader.onload = function(e) {
              var previewElement = document.getElementById("avatar-preview");
              previewElement.src = e.target.result;
              };
              reader.readAsDataURL(input.files[0]);
              }
              }
        </script>
</section>
<!-- Section: Design Block -->
</body>
</html>