@vite('resources/css/app.css')
@php
    use App\Models\keranjang;
    use App\Models\checkout;
    $datas = Auth::check()
        ? keranjang::where('user_id', Auth::User()->id)
            ->where('is_checkout', false)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get()
        : [];
    $checkouts = Auth::check() ? checkout::where('user_id', Auth::user()->id)->get() : [];
@endphp

<nav style='z-index: 9999;' class="py-3 border-b bg-white border-gray-100 relative">
    <div class="hidden md:flex flex-row items-center justify-around ">
        <div class="text-2xl text-orange-500">
            Rita Cake
        </div>
        <ul class="flex flex-row text-xl gap-10">
            <li class="ease-in transition-all hover:text-orange-500 hover:scale-110">
                <a href="{{ route('home') }}">Beranda</a>
            </li>
            <li class="ease-in transition-all hover:text-orange-500 hover:scale-110">
                <a href="{{ route('shop') }}">Toko</a>
            </li>
            <li class="ease-in transition-all hover:text-orange-500 hover:scale-110">
                <a href="{{ route('about') }}">Tentang</a>
            </li>
            <li class="ease-in transition-all hover:text-orange-500 hover:scale-110">
                <a href="{{ route('contact') }}">Kontak</a>
            </li>
        </ul>

        <div class="flex gap-4">
            @if (Auth::check())
                <a href="{{ route('keranjang.index') }}">
                    <div id='toggleCart'
                        class="shadow-md  w-10 h-10 ease-in transition-all hover:text-orange-500 hover:scale-110 rounded-full flex justify-center items-center">
                        <i class="fa-solid fa-cash-register "></i>
                    </div>
                </a>
                <a href="{{ route('history.index') }}">
                    <div id='toggleHistory'
                        class="shadow-md  w-10 h-10 ease-in transition-all hover:text-orange-500 hover:scale-110 rounded-full flex justify-center items-center">
                        <i class="fa-solid fa-history"></i>
                    </div>
                </a>
                <a href="{{ route('profile') }}">
                    <div
                        class="shadow-md  w-10 h-10 ease-in transition-all hover:text-orange-500 hover:scale-110 rounded-full flex justify-center items-center">
                        <i class="fa-solid fa-user text-center scale-110 "></i>
                    </div>
                </a>
            @else
                <a href="{{ route('login') }}" class="btn btn-primary">
                    Login
                </a>
            @endif
        </div>
    </div>

    <div class="md:hidden flex">
        <div class="flex flex-row mx-10 w-full items-center justify-between">
            <div class="text-2xl font-semibold text-orange-500">
                Rita Cake
            </div>
            <div class="flex gap-4">
                @if (Auth::check())
                    <a href="{{ route('keranjang.index') }}">
                        <div id='toggleCart'
                            class="shadow-md w-10 h-10 ease-in transition-all hover:text-orange-500 hover:scale-110 rounded-full flex justify-center items-center">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </div>
                    </a>
                    <a href="{{ route('profile') }}">
                        <div
                            class="shadow-md  w-10 h-10 ease-in transition-all hover:text-orange-500 hover:scale-110 rounded-full flex justify-center items-center">
                            <i class="fa-solid fa-user text-center  scale-110"></i>
                        </div>
                    </a>
                    <button id="toggleSidebar"
                        class="shadow-md ease-in transition-all hover:text-orange-500 hover:scale-110 w-10 h-10 rounded-full flex justify-center items-center">
                        <i class="fa-solid fa-bars "></i>
                    </button>
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary">
                        Login
                    </a>
                @endif
            </div>
        </div>
    </div>

    <div id='sidebar'
        class="md:hidden absolute bg-white shadow-md -translate-x-full transition-all  ease-in-out font-normal text-lg  mt-4 w-full">
        <div class="flex flex-col mx-10 py-6">
            <ul class="flex flex-col gap-5">
                <div
                    class="home w-full hover:text-orange-500 transition-all px-10 ease-in-out hover:ease-in-out hover:translate-x-3">
                    <li class="flex flex-col gap-2">
                        <a href="{{ route('home') }}">Home</a>
                        <hr class="transition-all bg-orange-200 ease-in-out transform -translate-x-full ">
                    </li>
                </div>
                <div
                    class="home w-full hover:text-orange-500 transition-all px-10 ease-in-out hover:ease-in-out hover:translate-x-3">
                    <li class="flex flex-col gap-2">
                        <a href="{{ route('shop') }}">Shop</a>
                        <hr class="transition-all bg-orange-200 ease-in-out transform -translate-x-full ">
                    </li>
                </div>
                <div
                    class="home w-full hover:text-orange-500 transition-all px-10 ease-in-out hover:ease-in-out hover:translate-x-3">
                    <li class="flex flex-col gap-2">
                        <a href="{{ route('contact') }}">Contact</a>
                        <hr class="transition-all bg-orange-200 ease-in-out transform -translate-x-full ">
                    </li>
                </div>
                <div
                    class="home w-full hover:text-orange-500 transition-all px-10 ease-in-out hover:ease-in-out hover:translate-x-3">
                    <li class="flex flex-col gap-2">
                        <a href="{{ route('about') }}">About Us</a>
                        <hr class="transition-all bg-orange-200 ease-in-out transform -translate-x-full ">
                    </li>
                </div>
            </ul>
        </div>
    </div>

    {{-- <div id='cart'
        class="absolute right-0 translate-x-full shadow-lg px-10 py-2 rounded-l-lg bg-white transition-all ease-in-out font-normal text-lg mt-4">
        <div class="mb-3">
            <h1 class="text-xl font-semibold text-orange-500">Your Cart</h1>
        </div>
        @if (Auth::check())
            @foreach ($datas as $data)
                @if ($data->is_checkout == false)
                    <div class="flex flex-row gap-4 mb-3 items-center justify-center shadow-md p-2 rounded-lg">
                        <div class="w-14 shadow-inner p-2 rounded-md">
                            <img src="{{ asset('/' . $data->product->image) }}" alt="">
                        </div>
                        <div>
                            <h1>{{ $data->product->name }}</h1>
                            <p class="text-base text-orange-500 font-light">{{ $data->product->price }}</p>
                        </div>
                    </div>
                @endif
            @endforeach
        @else
            <p class="text-base text-orange-500 font-light">Please login to see your cart items.</p>
        @endif
    </div> --}}

    {{-- <div id='history'
        class="absolute right-0 translate-x-full shadow-lg px-10 py-2 rounded-l-lg bg-white transition-all ease-in-out font-normal text-lg mt-4">
        <div class="mb-3">
            <h1 class="text-xl font-semibold text-orange-500">Your History</h1>
        </div>
        @if (Auth::check())
            @foreach ($datas as $data)
                @foreach ($checkouts as $checkout)
                    <div class="flex flex-row gap-4 mb-3 items-center justify-center shadow-md p-2 rounded-lg">
                        <div class="w-14 shadow-inner p-2 rounded-md">
                            <img src="{{ asset('/' . $data->product->image) }}" alt="">
                        </div>
                        <div>
                            <h1>{{ $data->product->name }}</h1>
                            <p class="text-base text-orange-500 font-light">{{ $data->product->price }}</p>
                            <p class="text-base text-orange-500 font-light">{{ $checkout->status }}</p>
                            <p class="text-base text-orange-500 font-light">{{ $checkout->tanggal_antar }}</p>
                        </div>
                    </div>
                @endforeach
            @endforeach
        @else
            <p class="text-base text-orange-500 font-light">Please login to see your history.</p>
        @endif
    </div> --}}

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let sidebar = document.getElementById("sidebar");
            let toggleSidebarButton = document.getElementById("toggleSidebar");

            toggleSidebarButton.addEventListener("click", function() {
                // Toggle the class when the button is clicked
                sidebar.classList.toggle("-translate-x-full");
            });

            let cart = document.getElementById("cart");
            let toggleCartButton = document.getElementById("toggleCart");

            toggleCartButton.addEventListener("mouseenter", function() {
                // Remove class on mouse enter
                cart.classList.remove("translate-x-full");
            });

            toggleCartButton.addEventListener("mouseleave", function() {
                // Add class on mouse leave
                cart.classList.add("translate-x-full");
            });

            let history = document.getElementById("history");
            let toggleHistoryButton = document.getElementById("toggleHistory");

            toggleHistoryButton.addEventListener("mouseenter", function() {
                // Remove class on mouse enter
                history.classList.remove("translate-x-full");
            });

            toggleHistoryButton.addEventListener("mouseleave", function() {
                // Add class on mouse leave
                history.classList.add("translate-x-full");
            });
        });
    </script>
</nav>
