@extends('layouts.mainUser')

@section('contentUser')
    <div class="mx-10 md:mx-20 lg:mx-24 mt-5">

        <div class="lg:w-1/2 mx-auto flex flex-col p-4 shadow-xl rounded-2xl  ">
            <div class=" flex flex-col py-2 border-b">
                <h1 class="text-3xl font-semibold">Profile</h1>
                <p class="text-gray-600 text-sm">Manage your account information and privacy setting</p>
            </div>
            <div class="py-4  ">
                <form action="" class="flex flex-col gap-2">

                    @foreach(['Username', 'Email', 'Alamat', 'No Handphone'] as $label)
                        <div class="flex flex-col justify-between relative text-gray-400 ">
                            <label for="{{ strtolower($label) }}" class="pl-2 absolute top-1/2 -translate-y-1/2 left-2 transition-all ease-in " id="{{ strtolower($label) . 'Label' }}">{{ $label }}</label>
                            <input type="text"  id="{{ strtolower($label) }}" class="border pl-2 w-full rounded-md py-2 focus:outline-none  focus:ring focus:ring-orange-200" onfocus="showLabel('{{ strtolower($label) }}')" onblur="hideLabel('{{ strtolower($label) }}')">
                        </div>
                    @endforeach
                    <hr class="my-3">
                    <button class="w-full bg-orange-500 border text-white font-medium py-2  rounded-md">Save Changes</button>
                </form>
            </div>
            <a href="{{route('logout')}}" class="w-full text-center border py-2  bg-red-500  text-white font-medium rounded-md">Logout</a>

        </div>
    </div>

<script>
    function showLabel(inputId) {
        var label = document.getElementById(inputId + 'Label');
        label.classList.add('hide-label');
    }

    function hideLabel(inputId) {
        var label = document.getElementById(inputId + 'Label');
        var input = document.getElementById(inputId);

        if (input.value === '') {
            label.classList.remove('hide-label');
        }
    }
</script>
@endsection
