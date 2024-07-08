@extends('layouts.main')

@section('content')
    <div class="m-10">
        <div class="pull-right mb-2">
            <a class="btn btn-primary" href="{{ route('product.index') }}">Back</a>
        </div>
        @if ($errors->any())
            <div class="bg-red-400 p-4 mb-4 rounded-md">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li class="text-white">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
            @method('PATCH')
            @csrf

            <div class="mb-4">
                <label class="block text-gray-600">Name Product</label>
                <input type="text" name="name" value="{{ $product->name }}" placeholder="Name Product"
                    class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500"
                    autocomplete="off">
            </div>

            <div class="mb-4">
                <label class="block text-gray-600">Price</label>
                <input type="number" name="price" value="{{ $product->price }}" placeholder="Rp 0"
                    class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500"
                    autocomplete="off">
            </div>
            <div class="mb-4">
                <label class="block text-gray-600">Quantity</label>
                <input type="number" name="quantity" value="{{ $product->quantity }}" placeholder="Quantity"
                    class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500"
                    autocomplete="off">
            </div>

            <div class="mb-4">
                <label class="block text-gray-600">Image</label>
                <input type="file" name="image"
                    class="w-full border bg-white border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500"
                    autocomplete="off">
            </div>

            <div class="mb-4">
                <label for="catagory">Catagory</label>
                <select id="catagory" name="catagory_id"
                    class="block w-full text-sm text-gray-500 border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                    @foreach ($catagorys as $catagory)
                        <option value="{{ $catagory->id }}" {{ $catagory->id == $product->catagory_id ? 'selected' : '' }}>
                            {{ $catagory->name_catagory }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit"
                class="bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded-md py-2 px-4 w-full">Update Product</button>
        </form>
    </div>
@endsection
