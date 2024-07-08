<section class="">
    <div class="flex flex-row gap-2 justify-start items-center">
        <h1 class="text-2xl font-normal text-gray-700 py-4 ">Product</h1>
        <p class="font-normal text-orange-500 text-base pt-1">{{ $selectedCategory->name_catagory }}</p>
    </div>
    <hr>

    <div class="flex-wrap flex  justify-between lg:justify-start lg:gap-4">
        @foreach ($products as $product)
            <div id='{{ $product->id }}'
                class="mt-5 w-full sm:w-48 md:w-52 lg:w-[243px] flex flex-col shadow-md transition-all hover:scale-105 hover:shadow-xl ease-out rounded-3xl  ">
                <div class="  h-[15rem]">
                    <img src="{{ asset($product->image) }}" alt="" class="h-full w-full object-contain">
                    {{-- <img src=" {{  $product->image }}" alt="" class="h-full   w-full object-contain"> --}}
                </div>
                <div class="flex flex-row justify-between items-center h-full p-3">
                    <div class="w-[70%]">
                        <div
                            class="leading-5 whitespace-pre-wrap whitespace-collapse text-wrap break-keep-all overflow-hidden max-h-10 flex mb-1">
                            <div class="line-clamp-2 font-normal text-gray-600">
                                {{ $product->name }}
                            </div>
                        </div>
                        <h1 class="font-semibold text-xl text-orange-500">Rp {{ $product->price }} ,</h1>
                    </div>
                    @if (Auth::check())
                        <form action="{{ url('keranjang/' . $product->id) }}" method="POST">
                            @csrf
                            <button type='submit'
                                class="outline-none hover:outline-none shadow-md w-10 h-10 ease-in transition-all hover:text-orange-500 hover:scale-110 rounded-full flex justify-center items-center">
                                <i class="fa-solid fa-shop"></i>
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}"
                            class="outline-none hover:outline-none shadow-md w-10 h-10 ease-in transition-all hover:text-orange-500 hover:scale-110 rounded-full flex justify-center items-center">
                            <i class="fa-solid fa-shop"></i>
                    </a>
                    @endif

                </div>
            </div>
        @endforeach

    </div>
</section>
