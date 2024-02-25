@extends('layouts.main')

@section('content')

    <div class="m-10">
        <div class="pull-right mb-2">
            <a class="btn btn-primary" href="{{ route('catagory.index') }}"> Back</a>
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

        <form action="{{ route('catagory.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-600">Name catagory</label>
                <input type="text" name="name_catagory" placeholder="Name Product"
                    class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500"
                    autocomplete="off">
            </div>

            <button type="submit"
                class="bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded-md py-2 px-4 w-full">Create
                Product</button>
        </form>
    </div>

@endsection
