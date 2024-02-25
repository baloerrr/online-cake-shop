@extends('layouts.main')

@section('content')


    <div class="m-10 ">
        <div class="pull-right mb-2">
            <a class="btn btn-primary" href="{{ route('user.index') }}"> Back</a>
        </div>
        @if ($errors->any())
        <div class="bg-red-400">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

        <form action="{{ route('storeUser') }}" method="POST">
            @csrf

            <div class="mb-4 ">
                <label for="username" class="block text-gray-600">Username</label>
                <input type="text" id="name" name="name"
                    class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500"
                    autocomplete="off">
            </div>

            <div class="mb-4 ">
                <label for="username" class="block text-gray-600">email</label>
                <input type="text" id="email" name="email"
                    class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500"
                    autocomplete="off">
            </div>
            <div class="mb-4 ">
                <label for="username" class="block text-gray-600">alamat</label>
                <input type="text" id="email" name="alamat"
                class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500"
                autocomplete="off">
            </div>

            <div class="mb-4 ">
                <label for="username" class="block text-gray-600">no_hp</label>
                <input type="number" id="email" name="no_hp"
                    class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500"
                    autocomplete="off">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-600">Password</label>
                <input type="password" id="password" name="password"
                    class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500"
                    autocomplete="off">
            </div>

            <button type="submit"
                class="bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded-md py-2 px-4 w-full">Create User</button>
        </form>

    </div>


@endsection
