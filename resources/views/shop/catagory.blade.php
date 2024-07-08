<div>
    <h1 class="text-xl font-normal text-gray-700 mt-5">Cari berdasarkan Kategori</h1>
    <div class="flex flex-wrap gap-3 mb-4">
        @foreach ($catagorys as $catagory )
        <div id='{{$catagory->id}}' onclick="location.href='{{url('/shop/'.$catagory->id)}}'"
            class="cursor-pointer flex flex-col w-20 md:w-[110px] lg:w-48 group-catagory h-28 ease-in hover:scale-110 bg-white hover:shadow-xl rounded-xl  transition-all justify-center items-center shadow-md gap-3 mt-3 py-3 text-gray-800 hover:text-orange-500 ">
                <p class="text-sm lg:text-lg font-medium text-center">{{$catagory->name_catagory}} </p>
        </div>
        @endforeach
    </div>
    <hr>
</div>
