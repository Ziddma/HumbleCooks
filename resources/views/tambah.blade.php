<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Humble's Cook's</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <link rel="shortcut icon" href="{{ asset('/rumah/images/favicon/hc.png')}}" type="image/x-icon">


    <link rel="stylesheet" href="{{ asset('/rumah/css/main.css')}}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Roboto:wght@400;500;700&display=swap"
        rel="stylesheet">
        <link rel="stylesheet" href=
        "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.css"> </link>
    <link rel="stylesheet" href="{{ asset('/rumah/css/font-awesome.min.css')}}">
</head>


    <!-- header -->
    <header class="py-4 shadow-sm bg-white">
        <div class="container flex items-center justify-between">
            <a href="{{ route('home') }}">
                <img src="{{ asset('/css/logo.png')}}" alt="Logo" width="300" height="253">
            </a>
            <div class="mb-4 flex justify-end">
                <form action="{{ route('search') }}" method="GET" class="flex">
                    <input type="text" name="search" value="{{ $search ?? '' }}"
                        class="flex-1 px-2 py-1 border border-gray-300 dark:border-gray-700 dark:bg-gray-900 focus:outline-none dark:text-white"
                        placeholder="Search ingredient...">
                    <button type="submit"
                        class="ml-2 px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white font-medium rounded">
                        Search
                    </button>
                </form>
            </div>
            {{-- <div class="w-full max-w-xl relative flex">
                <span class="absolute left-4 top-3 text-lg text-gray-400">
                    <i class="fa fa-search" ></i>
                </span><form action="{{ route('search')}}" method="GET">
                    @csrf
                    @method('GET')
                <input type="text" name="search" id="search" class="w-full border border-primary border-r-0 pl-12 py-3 pr-3 rounded-l-md focus:outline-none hidden md:flex"
                    placeholder="search">
                    <button type="submit" class="bg-primary border border-primary text-white px-8 rounded-r-md hover:bg-transparent hover:text-primary transition hidden md:flex"
                            style="display: flex; justify-content: center; font-size: 30px;" name="search" id="search">cari
                    </button>
                </form>
            </div> --}}

            <div class="flex items-center space-x-4">
                <a href="#" class="text-center text-gray-700 hover:text-primary transition relative">
                    <div class="text-2xl">
                        <i class="fa fa-plus-square-o"></i>
                    </div>
                    <div class="text-xs leading-3">Tambah resep</div>
                </a>
                <a href="{{ route('profile.edit') }}" class="text-center text-gray-700 hover:text-primary transition relative">
                    <div class="text-2xl">
                        <i class="fa-regular fa-user"></i>
                    </div>
                    <div class="text-xs leading-3">Akun</div>
                </a>
            </div>
        </div>
    </header>
    <!-- ./header -->

    <!-- navbar -->
    <nav class="bg-gray-800">
        <div class="container flex">
            <div class="flex items-center justify-between flex-grow md:pl-12 py-5">
                <div class="flex items-center space-x-6 capitalize">
                    <a href="pages/shop.html" class="text-gray-200 hover:text-white transition">Shop</a>
                    <a href="#" class="text-gray-200 hover:text-white transition">About us</a>
                    <a href="#" class="text-gray-200 hover:text-white transition">Contact us</a>
                </div>
                <div style="text-align: right;" class="flex items-center space-x-4">
                @if (Route::has('login'))
                
                    @auth
                         <a href="{{ __('logout') }}" method="POST" class="text-gray-200 hover:text-white transition">Logout</a>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-200 hover:text-white transition">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-gray-200 hover:text-white transition mr-12">Register</a>
                        @endif
                    @endauth
                
            @endif
                </div>
            </div>
        </div>
    </nav>


    <body>
            
        {{-- Add picture --}}
    <div class="container" style="height: 350px; width: 430px; position: relative;">
        <div class="wrapper" style="position: relative;
        height: 300px;
        width: 100%;
        border-radius: 10px;
        background: #fff;
        border: 2px dashed #c2cdda;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;">
           <div class="image" style="position: absolute;height: 100%;display: flex;align-items: center;justify-content: center;">
              <img id="hslimg" alt="" style="height: 100%;width: 100%;object-fit: cover;">
           </div>
           <div class="content">
              <div class="icon" style="font-size: 100px;
              color: #9658fe;">
                 <i class="fas fa-cloud-upload-alt"></i>
              </div>
              <div class="text" style="font-size: 20px;
              font-weight: 500;
              color: #5b5b7b;">
                 No file chosen, yet!
              </div>
           </div>
           <div id="cancel-btn">
              <i class="fas fa-times"></i>
           </div>
           <div class="file-name">
              File name here
           </div>
        </div>
        <button onclick="defaultBtnActive()" id="custom-btn">Choose a file</button>
        <input id="default-btn" type="file" hidden>
     </div>
     <script>
        const wrapper = document.querySelector(".wrapper");
        const fileName = document.querySelector(".file-name");
        const defaultBtn = document.querySelector("#default-btn");
        const customBtn = document.querySelector("#custom-btn");
        const cancelBtn = document.querySelector("#cancel-btn i");
        const img = document.querySelector("#hslimg");
        let regExp = /[0-9a-zA-Z\^\&\'\@\{\}\[\]\,\$\=\!\-\#\(\)\.\%\+\~\_ ]+$/;
        function defaultBtnActive(){
          defaultBtn.click();
        }
        defaultBtn.addEventListener("change", function(){
          const file = this.files[0];
          if(file){
            const reader = new FileReader();
            reader.onload = function(){
              const result = reader.result;
              img.src = result;
              wrapper.classList.add("active");
            }
            cancelBtn.addEventListener("click", function(){
              img.src = "";
              wrapper.classList.remove("active");
            })
            reader.readAsDataURL(file);
          }
          if(this.value){
            let valueStore = this.value.match(regExp);
            fileName.textContent = valueStore;
          }
        });
     </script>
    {{-- End add picture --}}

    {{-- Start Form Judul--}}

    <form>
        <div class="form-group" id="form-judul">
            <label for="formGroupExampleInput">Judul Resep</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Cerita Dibalik Resep Ini</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>
          <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Porsi</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="porsi" placeholder="">
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Lama Memasak</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="lama-masak" placeholder="">
                </div>
            </form>
        {{-- End Form judul--}}

        {{-- Start form bahan --}}

        {{-- End form bahan --}}
    

    

    <!-- footer -->


    <!-- copyright -->
    <div class="bg-gray-800 py-4">
        <div class="container flex items-center justify-between">
            <p class="text-white">&copy; Humble's Cook's Corp</p>

        </div>
    </div>
    <!-- ./copyright -->
</body>

</html>