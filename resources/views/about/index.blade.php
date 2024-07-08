@extends('layouts.mainUser')

@section('contentUser')
    <div class="mx-10 md:mx-20 lg:mx-24 mt-5">
        <div class="lg:w-full mx-auto flex flex-col p-4 shadow-xl rounded-2xl">
            <div class="flex flex-col py-2 border-b">
                <h1 class="text-3xl font-semibold">Tentang Kami</h1>
            </div>
            <div class="py-4 flex flex-col lg:flex-row gap-4">
                <div class="flex-1">
                    <img src="{{ asset('image/about.png') }}" alt="About Us Image" class="rounded-xl w-full h-auto shadow-lg p-2">
                </div>
                <div class="flex-1 flex flex-col justify-center">
                    <h2 class="text-2xl font-semibold mb-2">Kisah Kami</h2>
                    <p class="text-gray-700 mb-4">
                        Rita Kue dimulai dari sebuah kecintaan sederhana terhadap seni membuat kue dan impian untuk berbagi
                        kelezatan dengan seluruh warga Palembang. Perjalanan kami dimulai di sebuah dapur kecil dan telah
                        berkembang menjadi merek yang dicintai karena kualitas dan rasa yang istimewa. Setiap kue yang kami
                        buat dipenuhi dengan cinta dan dedikasi untuk memastikan bahwa setiap gigitan membawa kebahagiaan.
                    </p>
                    <p class="text-gray-700 mb-4">
                        Berawal dari resep-resep tradisional yang diwariskan dari generasi ke generasi, kami terus berinovasi
                        dengan menciptakan berbagai varian kue yang menggugah selera. Kue-kue kami tidak hanya lezat tetapi juga
                        dibuat dengan bahan-bahan berkualitas tinggi, menjadikan setiap produk kami unik dan spesial.
                    </p>
                    <p class="text-gray-700 mb-4">
                        Di Rita Kue, kami percaya bahwa setiap perayaan, besar atau kecil, layak untuk dirayakan dengan kue yang
                        sempurna. Itulah mengapa kami selalu berusaha memberikan yang terbaik dalam setiap produk yang kami tawarkan.
                        Dari ulang tahun, pernikahan, hingga acara-acara khusus lainnya, kue-kue kami telah menjadi bagian dari
                        momen-momen berharga dalam kehidupan banyak orang.
                    </p>
                    <p class="text-gray-700 mb-4">
                        Kami berkomitmen untuk terus mempertahankan standar kualitas tinggi kami dan terus berinovasi untuk memenuhi
                        kebutuhan pelanggan kami. Terima kasih telah menjadi bagian dari perjalanan kami. Kami berharap dapat terus
                        memberikan kebahagiaan melalui setiap kue yang kami buat.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
