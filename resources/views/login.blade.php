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
        <div class="w-full lg:w-2/3 bg-white rounded-xl shadow-lg overflow-hidden flex flex-col lg:flex-row">
            <div class="lg:w-1/2 hidden lg:flex items-center justify-center bg-gray-200">
                <img src="{{ asset('image/loginbanner.png') }}" alt="Login Image" class="w-full h-auto object-cover">
            </div>
            <div class="w-full lg:w-1/2 p-8 lg:p-12 flex flex-col justify-center">
                @if (session('success'))
                    <div class="font-regular relative mb-4 block w-full rounded-lg bg-green-500 p-4 text-base leading-5 text-white opacity-100">
                        {{ session('success') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="bg-red-400 mb-4 p-4 rounded-lg">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="text-white">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <h1 class="text-2xl font-semibold mb-4 text-center lg:text-left text-orange-500">Login</h1>
                <form action="{{ route('login.post') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="username" class="block text-gray-600">Email</label>
                        <input type="text" id="username" name="email"
                            class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500 placeholder:italic"
                            autocomplete="off">
                    </div>

                    <div class="mb-4">
                        <label for="password" class="block text-gray-600">Password</label>
                        <input type="password" id="password" name="password"
                            class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500 placeholder:italic"
                            autocomplete="off">
                    </div>

                    <button type="submit"
                        class="bg-orange-500 hover:bg-orange-600 text-white font-semibold rounded-md py-2 px-4 w-full">Login</button>
                </form>

                <div class="mt-6 text-blue-500 text-center">
                    <a href="{{ route('register') }}" class="hover:underline">Sign up Here</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
