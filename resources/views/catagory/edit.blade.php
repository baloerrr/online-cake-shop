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

        <form action="{{ route('catagory.update', $catagory->id) }}" method="POST">
            @method('PATCH')
            @csrf

            <div class="mb-4">
                <label class="block text-gray-600">Name Category</label>
                <input type="text" name="name_catagory" value="{{ $catagory->name_catagory }}" placeholder="Name Category"
                    class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500"
                    autocomplete="off">
            </div>

            <button type="submit"
                class="bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded-md py-2 px-4 w-full">Update
                Category</button>
        </form>
    </div>
@endsection
