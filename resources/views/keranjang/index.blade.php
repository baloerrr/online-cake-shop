@extends('layouts.mainUser')

@section('contentUser')
    {{-- @php
        function rupiah($total)
        {
            return 'Rp ' . number_format($total, 0, ',', '.');
        }
    @endphp --}}

    <div class="mx-10 md:mx-20 lg:mx-24 mt-2 grid grid-cols-12">
        @if (session()->has('success'))
            <div class="col-span-12 alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        <div class="col-span-12 lg:col-span-7 lg:mr-10">
            <h1 class="text-3xl my-3 font-medium">Keranjang</h1>
            @php
                $processedProductIds = [];
                $total = 0;
            @endphp
            @if (Session::get('failed'))
                <div class="alert alert-danger">
                    {{ session()->get('failed') }}
                </div>
            @endif

            {{-- @if (count($datas) == 0)
                <div class="col-span-12 flex justify-center items-center  shadow-lg rounded-md my-7 py-6 px-2">
                    <h1 class="text-3xl font-semibold">Keranjang Masih Kosong !</h1>
                </div>
            @endif --}}

            @foreach ($datas as $data)
                @if (!in_array($data->product_id, $processedProductIds))
                    @php
                        $processedProductIds[] = $data->product_id;
                        $total_sementara = $data->quantity * $data->product->price;
                    @endphp

                    <form action="{{ route('keranjang.update', $data->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div
                            class="col-span-12 flex flex-col md:flex-row items-start md:justify-between md:items-center shadow-inner rounded-md my-4 p-2">
                            <div class="flex flex-row justify-between w-full mb-2 pb-2 items-center">
                                <div class="h-[5rem]">
                                    <img src="{{ $data->product->image }}" alt=""
                                        class="h-full w-full object-contain">
                                </div>
                                <div>
                                    <p class="text-base">{{ $data->product->name }}</p>
                                    <h1 class="text-lg font-medium text-orange-500">{{ $data->product->price }}</h1>
                                </div>
                                <div>
                                    <ul class="flex flex-row gap-2 border px-4 py-2">
                                        <li>
                                            <a href="{{ route('keranjang.handlerminus', $data->product_id) }}">-</a>
                                        </li>
                                        <li>
                                            <p id="quantity{{ $data->product_id }}">{{ $data->quantity }}</p>
                                        </li>
                                        <li>
                                            <a href="{{ route('keranjang.handlerplus', $data->product_id) }}">+</a>
                                        </li>
                                    </ul>
                                </div>
                                <form action="{{ route('keranjang.destroy', $data->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="shadow-md transition-all hover:scale-105 hover:text-red-500 w-10 h-10 rounded-full">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </form>
                @endif
                @php
                    $total += $total_sementara;
                @endphp
            @endforeach


        </div>
        <div class="shadow-lg h-44 rounded-lg mt-20 lg:col-span-5 col-span-12 p-2">
            <h1 class="text-2xl font-medium">Ringkasan Belanjang</h1>
            <div class="flex flex-row justify-between py-2 items-center">
                <p class="text-gray-500 ">Total</p>
                <p class="text-orange-500 font-medium">{{ $total }}</p>
            </div>
            <hr>

            {{-- <button
                class="w-full border  transition-all ease-in-out bg-orange-500 text-white font-medium mt-4 mb-2 text-center shadow-md rounded-lg py-2">
                <p>Checkout Sekarang</p>
            </button> --}}

            <!-- Button trigger modal -->
            <button type="button"
                class="w-full transition-all  ease-in-out hover:duration-500 duration-500 text-orange-500 hover:bg-orange-500 hover:text-white font-medium mt-4 mb-2 text-center border  rounded-lg py-2"
                data-toggle="modal" data-target="#exampleModal">
                Checkout Sekarang
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Selesai kan pembayaran</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="flex flex-col gap-4">
                                <div>Metode Pembayaran</div>
                                <hr>
                                <div class="flex justify-between">
                                    <button
                                        class="text-orange-500 border hover:text-white hover:bg-orange-500 w-20 h-10 rounded-lg transition-all ease-in duration-300 hover:duration-300">Mandiri</button>
                                    <button
                                        class="text-orange-500 border hover:text-white hover:bg-orange-500 w-20 h-10 rounded-lg transition-all ease-in duration-300 hover:duration-300">BNI</button>
                                    <button
                                        class="text-orange-500 border hover:text-white hover:bg-orange-500 w-20 h-10 rounded-lg transition-all ease-in duration-300 hover:duration-300">BRI</button>
                                    <button
                                        class="text-orange-500 border hover:text-white hover:bg-orange-500 w-20 h-10 rounded-lg transition-all ease-in duration-300 hover:duration-300">BSI</button>
                                </div>
                                <div class="flex flex-col gap-5 ">
                                    <div>
                                    <label for="virtual_acc" class="block text-gray-600">Virtual Account</label>
                                    <input type="text" id="virtual_acc" value="0230239232" name="virtual_acc"
                                        class="w-full border text-gray-600 border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500"
                                        autocomplete="off" disabled>
                                    </div>
                                    <div class="flex flex-col gap-2">
                                        <h1 class="text-gray-600">Bukti Pembayaran</h1>
                                        <div class="mb-3">
                                            <input
                                              class="relative  m-0 block w-full min-w-0 flex-auto file:rounded  rounded border border-solid border-orange-500 bg-clip-padding px-3 py-[0.32rem] text-base font-normal  transition duration-300 ease-in-out file:-mx-4 file:-my-[0.32rem] file:overflow-hidden  file:border-0 file:border-solid file:border-inherit file:bg-orange-500  file:py-[0.32rem] file:text-white file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem]"
                                              type="file"
                                              id="formFile" />
                                          </div>
                                </div>
                                </div>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn bg-orange-500 text-white" data-dismiss="modal">Close</button>
                            <button type="button" class="btn bg-white border text-orange-500">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <form action="{{ route('checkout.store') }}" method="POST">
                @csrf
                <button
                    class="w-full border  transition-all ease-in-out bg-orange-500 text-white font-medium mt-4 mb-2   shadow-md rounded-lg py-2">Check
                    Out</button>
            </form> --}}

        </div>
    </div>
@endsection
