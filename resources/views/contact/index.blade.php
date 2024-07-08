@extends('layouts.mainUser')

@section('contentUser')
    <div class="mx-10 md:mx-20 lg:mx-24 mt-5">
        <div class="lg:w-1/2 mx-auto flex flex-col p-4 shadow-xl rounded-2xl">
            <div class="flex flex-col py-2 border-b">
                <h1 class="text-3xl font-semibold">Kontak Kami</h1>
                <p class="text-gray-600 text-sm">Hubungi kami untuk pertanyaan atau dukungan apa pun</p>
            </div>
            <div class="py-4">
                <form action="" method="POST" class="flex flex-col gap-2">
                    {{-- @csrf

                    @foreach(['Name', 'Email', 'Message'] as $label)
                        <div class="flex flex-col justify-between relative text-gray-400">
                            <label for="{{ strtolower($label) }}" class="pl-2 absolute top-1/2 -translate-y-1/2 left-2 transition-all ease-in" id="{{ strtolower($label) . 'Label' }}">{{ $label }}</label>
                            @if($label == 'Message')
                                <textarea id="{{ strtolower($label) }}" name="{{ strtolower($label) }}" class="border pl-2 w-full rounded-md py-2 focus:outline-none focus:ring focus:ring-orange-200" onfocus="showLabel('{{ strtolower($label) }}')" onblur="hideLabel('{{ strtolower($label) }}')" rows="4"></textarea>
                            @else
                                <input type="text" id="{{ strtolower($label) }}" name="{{ strtolower($label) }}" class="border pl-2 w-full rounded-md py-2 focus:outline-none focus:ring focus:ring-orange-200" onfocus="showLabel('{{ strtolower($label) }}')" onblur="hideLabel('{{ strtolower($label) }}')">
                            @endif
                        </div>
                    @endforeach

                    <hr class="my-3"> --}}
                    <a href="https://api.whatsapp.com/send?phone=6285384086119&text=Hallo Rita Kue, Saya ingin memesan...." type="submit" class="w-full bg-orange-500 border text-white font-medium py-2 rounded-md text-center" target="_blank">Send Message</a>
                </form>
            </div>
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
