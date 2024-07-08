<section class="grid grid-cols-12">
    <div class="col-span-12 md:col-span-4 order-last md:order-first self-center text-center">
        <div class="flex-col flex gap-2 md:gap-6 mb-6 md:mb-10 md:text-left">
            <h1 class="font-bold text-3xl md:text-6xl">Toko <span class="text-orange-500">Kue Palembang</span> untuk
                Kelezatan Sehari-hari
            </h1>
            <p class="font-light text-base md:text-xl">Masuki dunia penuh kelezatan dan kenyamanan dengan Rita Kue, toko
                kue terbaik di Palembang di mana setiap kue menceritakan kisah kepuasan dan kesederhanaan.</p>
        </div>
        <div class="flex flex-row gap-4 items-center justify-center md:justify-start">
            <a href="{{ route('shop') }}"><button
                    class="bg-orange-500 hover:shadow-xl hover:scale-110 transition-all ease-in text-white px-3 py-2 rounded-full">Belanja
                    Sekarang</button></a>
            <a target="_blank" href="https://www.instagram.com/dapoermomritacake17?igsh=MWtvcnkyYmZlbGtscg=="
                class="shadow-sm text-orange-500 hover:shadow-xl hover:scale-110 transition-all ease-in px-3 py-2 rounded-full">Hubungi
                Kami</a>
        </div>
    </div>
    <div class="col-span-12 md:col-span-8 mb-10 mx-auto -z-30">
        <img src="{{ asset('image/hero.png') }}" alt="hero">
    </div>
</section>

<section class="grid grid-cols-12 gap-6 mt-10">
    <div class="col-span-12 text-center mb-10">
        <h2 class="font-bold text-3xl md:text-5xl">Best Sellers</h2>
        <p class="font-light text-base md:text-xl">Nikmati kue terbaik pilihan kami yang paling digemari oleh pelanggan.
        </p>
    </div>
    <!-- Card 1 -->
    <div class="col-span-12 md:col-span-4">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <img class="w-full h-48 object-contain" src="{{ asset('image/20240627042833.png') }}" alt="Kue 1">
            <div class="p-6">
                <h3 class="font-bold text-xl mb-2">Kue Lapis Legit</h3>
                <p class="text-gray-700 text-base">Kue lapis legit dengan rasa yang lezat dan tekstur yang lembut.</p>
                @if (Auth::check())
                    <a href="{{ route('shop') }}"><button
                            class="mt-4 bg-orange-500 text-white px-4 py-2 rounded-full hover:bg-orange-600 transition">Beli
                            Sekarang</button></a>
                @else
                    <a href="{{ route('login') }}"><button
                            class="mt-4 bg-orange-500 text-white px-4 py-2 rounded-full hover:bg-orange-600 transition">Beli
                            Sekarang</button></a>
                @endif
            </div>
        </div>
    </div>
    <!-- Card 2 -->
    <div class="col-span-12 md:col-span-4">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <img class="w-full h-48 object-contain" src="{{ asset('image/20240627043039.png') }}" alt="Kue 2">
            <div class="p-6">
                <h3 class="font-bold text-xl mb-2">Kue Rainbow</h3>
                <p class="text-gray-700 text-base">Kue Rainbow dengan warna yang bervariasi.</p>
                @if (Auth::check())
                    <a href="{{ route('shop') }}"><button
                            class="mt-4 bg-orange-500 text-white px-4 py-2 rounded-full hover:bg-orange-600 transition">Beli
                            Sekarang</button></a>
                @else
                    <a href="{{ route('login') }}"><button
                            class="mt-4 bg-orange-500 text-white px-4 py-2 rounded-full hover:bg-orange-600 transition">Beli
                            Sekarang</button></a>
                @endif
            </div>
        </div>
    </div>
    <!-- Card 3 -->
    <div class="col-span-12 md:col-span-4">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <img class="w-full h-48 object-contain" src="{{ asset('image/20240627042508.png') }}" alt="Kue 3">
            <div class="p-6">
                <h3 class="font-bold text-xl mb-2">Kue Blackforest</h3>
                <p class="text-gray-700 text-base">Kue coklat dengan rasa coklat yang kaya dan tekstur yang fudgy.</p>
                @if (Auth::check())
                    <a href="{{ route('shop') }}"><button
                            class="mt-4 bg-orange-500 text-white px-4 py-2 rounded-full hover:bg-orange-600 transition">Beli
                            Sekarang</button></a>
                @else
                    <a href="{{ route('login') }}"><button
                            class="mt-4 bg-orange-500 text-white px-4 py-2 rounded-full hover:bg-orange-600 transition">Beli
                            Sekarang</button></a>
                @endif

            </div>
        </div>
    </div>
</section>
