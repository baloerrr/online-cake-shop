@extends('layouts.mainUser')

@section('contentUser')
    <div class="mx-10 md:mx-20 lg:mx-24 mt-2 grid grid-cols-12">
        @if (session()->has('success'))
            <div class="col-span-12 alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        <div class="col-span-12 lg:col-span-7 lg:mr-10">
            <h1 class="text-3xl my-3 font-medium">History Pemesanan</h1>
            <span class="alert-danger">Pembatalan tidak akan diterima setelah satu jam pemesanan ya guys 😁🙏.</span>
            @foreach ($datas as $data)
                <div class="col-span-12 flex flex-col md:flex-row items-start md:justify-between md:items-center shadow-inner rounded-md my-4 p-2">
                    <div class="flex flex-row justify-between w-full mb-2 pb-2 items-center">
                        <div class="h-[5rem]">
                            <img src="{{ $data->keranjang->product->image }}" alt="" class="h-full w-full object-contain">
                        </div>
                        <div>
                            <p class="text-base">{{ $data->keranjang->quantity }}</p>
                        </div>
                        <div>
                            <p class="text-base">{{ $data->keranjang->product->name }}</p>
                            <h1 class="text-lg font-medium text-orange-500">{{ $data->keranjang->product->price }}</h1>
                        </div>
                        <div>
                            <p class="text-base">{{ $data->status }}</p>
                        </div>

                        {{-- <form action="{{ route('keranjang.destroy', $data->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="shadow-md transition-all hover:scale-105 hover:text-red-500 w-10 h-10 rounded-full">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form> --}}

                        @if ($data->status == 'proses')
                            <form action="{{ route('checkout.cancel', $data->id) }}" method="POST">
                                @csrf
                                @method('POST')
                                <button type="submit" class="shadow-md transition-all hover:scale-105 hover:text-yellow-500 w-10 h-10 rounded-full">
                                    <i class="fa-solid fa-ban"></i> Batal
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
