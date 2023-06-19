<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Humble's|Register</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/login.css" />
</head>

<body class="main-bg">
    <div class="logo">
    <img src="logo.png" class="rounded float-start" alt="">
    </div>
  <!-- Login Form -->
  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="login">
        <x-auth-session-status class="mb-4" :status="session('status')" />   
          <div class="card-title text-center border-bottom">
            <h2 class="p-3">Login</h2>
          </div>
          <form class="form" method="POST" action="{{ route('register')}}">
            @csrf
          <!-- Avatar -->
            <div class="mb-4">
                <x-input-label for="avatar" class="form-label" :value="__('Avatar')" />
                <x-file-input id="avatar" class="form-control" name="avatar" accept="image/*" />
                <x-input-error :messages="$errors->get('avatar')" class="mt-2" />
            </div>
            <!-- Name -->
            <div>
                <x-input-label for="name" class="form-label" :value="__('Name')" />
                <x-text-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
             <!-- Email Address -->
            <div class="mb-4">
                <x-input-label for="email" class="form-label" :value="__('Email')" />
                <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mb-4">
                <x-input-label for="password" class="form-label" :value="__('Password')" />

                <x-text-input id="password" class="form-control"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
           <!-- Confirm Password -->
            <div class="mb-4">
                <x-input-label for="password_confirmation" class="form-label"  :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="form-control"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
            <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
