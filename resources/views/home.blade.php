<x-app-user-layout>
    <!-- banner -->
    <div class="bg-cover bg-no-repeat bg-center py-36"
        style="background-image: url('{{ asset('/rumah/images/cook1.jpg') }}');">
        <div class="container">
            <h1 class="text-6xl text-white font-medium mb-4 capitalize">
                The place to find the best <br> dining menu
            </h1>
            <p class="text-white"">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aperiam <br>
                accusantium perspiciatis, sapiente
                magni eos dolorum ex quos dolores odio</p>

        </div>
    </div>
    <!-- ./banner -->

    <!-- features -->
    <div class="container py-16">
        <div class="w-10/12 grid grid-cols-1 md:grid-cols-3 gap-6 mx-auto justify-center">
            <div class="border border-primary rounded-sm px-3 py-6 flex justify-center items-center gap-5">
                <img src="{{ asset('/rumah/images/icons/delivery-van.svg') }}" alt="Delivery"
                    class="w-12 h-12 object-contain">
                <div>
                    <h4 class="font-medium capitalize text-lg">Free Shipping</h4>
                    <p class="text-gray-500 text-sm">Order over $200</p>
                </div>
            </div>
            <div class="border border-primary rounded-sm px-3 py-6 flex justify-center items-center gap-5">
                <img src="{{ asset('/rumah/images/icons/money-back.svg') }}" alt="Delivery"
                    class="w-12 h-12 object-contain">
                <div>
                    <h4 class="font-medium capitalize text-lg">Money Rturns</h4>
                    <p class="text-gray-500 text-sm">30 days money returs</p>
                </div>
            </div>
            <div class="border border-primary rounded-sm px-3 py-6 flex justify-center items-center gap-5">
                <img src="{{ asset('/rumah/images/icons/service-hours.svg') }}" alt="Delivery"
                    class="w-12 h-12 object-contain">
                <div>
                    <h4 class="font-medium capitalize text-lg">24/7 Support</h4>
                    <p class="text-gray-500 text-sm">Customer support</p>
                </div>
            </div>
        </div>
    </div>
    <!-- ./features -->

    {{-- <!-- categories -->
    <div class="container py-16">
        <h2 class="text-2xl font-medium text-gray-800 uppercase mb-6">shop by category</h2>
        <div class="grid grid-cols-3 gap-3">
            <div class="relative rounded-sm overflow-hidden group">
                <img src="{{ asset('/rumah/images/category/category-1.jpg')}}" alt="category 1" class="w-full">
                <a href="#"
                    class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-xl text-white font-roboto font-medium group-hover:bg-opacity-60 transition">Bedroom</a>
            </div>
            <div class="relative rounded-sm overflow-hidden group">
                <img src="{{ asset('/rumah/images/category/category-2.jpg')}}" alt="category 1" class="w-full">
                <a href="#"
                    class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-xl text-white font-roboto font-medium group-hover:bg-opacity-60 transition">Mattrass</a>
            </div>
            <div class="relative rounded-sm overflow-hidden group">
                <img src="{{ asset('/rumah/images/category/category-3.jpg')}}" alt="category 1" class="w-full">
                <a href="#"
                    class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-xl text-white font-roboto font-medium group-hover:bg-opacity-60 transition">Outdoor
                </a>
            </div>
            <div class="relative rounded-sm overflow-hidden group">
                <img src="{{ asset('/rumah/images/category/category-4.jpg')}}" alt="category 1" class="w-full">
                <a href="#"
                    class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-xl text-white font-roboto font-medium group-hover:bg-opacity-60 transition">Sofa</a>
            </div>
            <div class="relative rounded-sm overflow-hidden group">
                <img src="{{ asset('/rumah/images/category/category-5.jpg')}}" alt="category 1" class="w-full">
                <a href="#"
                    class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-xl text-white font-roboto font-medium group-hover:bg-opacity-60 transition">Living
                    Room</a>
            </div>
            <div class="relative rounded-sm overflow-hidden group">
                <img src="{{ asset('/rumah/images/category/category-6.jpg')}}" alt="category 1" class="w-full">
                <a href="#"
                    class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-xl text-white font-roboto font-medium group-hover:bg-opacity-60 transition">Kitchen</a>
            </div>
        </div>
    </div>
    <!-- ./categories --> --}}




    <!-- product -->
    <div class="container pb-16">
        <h2 class="text-2xl font-medium text-gray-800 uppercase mb-6">recomended for you</h2>



    </div>
    <!-- ./product -->



    <!-- copyright -->
    <div class="bg-gray-800 py-4">
        <div class="container flex items-center justify-between">
            <p class="text-white">&copy; Humble's Cook's Corp</p>

        </div>
    </div>
    <!-- ./copyright -->
</x-app-user-layout>
