<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Login</title>
</head>

<body>

    <div class="bg-gray-100 flex justify-center items-center h-screen">
        <div class="lg:p-36 md:p-52 sm:20 p-8 w-full lg:w-1/2">
            @if (session('success'))
                <div
                    class="font-regular relative mb-4 block w-full rounded-lg bg-green-500 p-4 text-base leading-5 text-white opacity-100">
                    {{ session('success') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="bg-red-400">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <h1 class="text-2xl font-semibold mb-4">Login</h1>
            <form action="{{ route('login.post') }}" method="POST">
                @csrf

                <div class="mb-4 ">
                    <label for="username" class="block text-gray-600">Username</label>
                    <input type="text" id="username" name="email"
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
                    class="bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded-md py-2 px-4 w-full">Login</button>
            </form>

            <div class="mt-6 text-blue-500 text-center">
                <a href="register" class="hover:underline">Sign up Here</a>
            </div>
        </div>
    </div>
</body>

</html>
