<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Register</title>
</head>

<body>
    <div class="bg-gray-100 flex justify-center items-center h-screen">
        <div class="p-8 w-full lg:w-1/2 bg-white rounded-xl shadow-lg">
            @if ($errors->any())
                <div class="bg-red-400 mb-4 p-4 rounded-lg">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-white">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <h1 class="text-2xl font-semibold mb-4 text-center">Register</h1>
            <form action="{{ route('register.post') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block text-gray-600">Username</label>
                    <input type="text" id="name" name="name"
                        class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500"
                        autocomplete="off">
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-gray-600">Email</label>
                    <input type="text" id="email" name="email"
                        class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500"
                        autocomplete="off">
                </div>

                <div class="mb-4">
                    <label for="alamat" class="block text-gray-600">Alamat</label>
                    <input type="text" id="alamat" name="alamat"
                        class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500"
                        autocomplete="off">
                </div>

                <div class="mb-4">
                    <label for="no_hp" class="block text-gray-600">No HP</label>
                    <input type="number" id="no_hp" name="no_hp"
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
                    class="bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded-md py-2 px-4 w-full">Register</button>
            </form>

            <div class="mt-6 text-blue-500 text-center">
                <a href="{{ route('login') }}" class="hover:underline">Sign in Here</a>
            </div>
        </div>
    </div>
</body>

</html>
