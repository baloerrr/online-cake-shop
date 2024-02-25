@extends('layouts.mainUser')

@section('contentUser')
    @php
        function rupiah($total)
        {
            return 'Rp ' . number_format($total, 0, ',', '.');
        }
    @endphp

    <div class="mx-10 md:mx-20 lg:mx-24 mt-2 grid grid-cols-12">
        @if (session()->has('success'))
            <div class="col-span-12 alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        <div class="col-span-12 lg:col-span-7 lg:mr-10">
            <h1 class="text-3xl my-3 font-medium">Keranjang</h1>
            @php
                $total = 0;
            @endphp
            @foreach ($datas as $data)
                <div
                    class="col-span-12  flex flex-col md:flex-row items-start md:justify-between md:items-center shadow-inner rounded-md my-4 p-2">
                    <div class="flex flex-row justify-between w-full  mb-2 pb-2 items-center">
                        <div class="  h-[5rem]">
                            <img src="{{ asset('/' . $data->product->image) }}" alt=""
                                class="h-full  w-full object-contain">
                        </div>
                        <div>
                            <p class="text-base">{{ $data->product->name }}</p>
                            <h1 class="text-lg font-medium text-orange-500">{{ rupiah($data->product->price) }}</h1>
                        </div>
                        <button
                            class="shadow-md transition-all hover:scale-105 hover:text-red-500 w-10 h-10 rounded-full"><i
                                class="fa-solid fa-trash"> </i></button>
                    </div>
                </div>
                @php
                    $total += $data->product->price;
                @endphp
            @endforeach
        </div>
        <div class="shadow-lg h-44 rounded-lg mt-20 lg:col-span-5 col-span-12 p-2">
            <h1 class="text-2xl font-medium">Ringkasan Belanjang</h1>
            <div class="flex flex-row justify-between py-2 items-center">
                <p class="text-gray-500 ">Total</p>
                <p class="text-orange-500 font-medium">{{ rupiah($total) }}</p>
            </div>
            <hr>
            <form action="{{ route('checkout.store') }}" method="POST">
                @csrf
                <input name="total" value="{{ $total }}" type="hidden">
                <button
                    class="w-full border  transition-all ease-in-out bg-orange-500 text-white font-medium mt-4 mb-2   shadow-md rounded-lg py-2">Check
                    Out</button>
            </form>
        </div>


    </div>
@endsection
