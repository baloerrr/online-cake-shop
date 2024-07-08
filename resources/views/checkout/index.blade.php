@extends('layouts.main')

@section('content')
    <div class="flex-1 overflow-x-hidden overflow-y-auto">
        <div class="container px-6 py-8 mx-auto">
            <div class="overflow-x-auto">
                <div class="inline-block min-w-full align-middle border-b border-gray-200 shadow sm:rounded-lg">
                    <table class="w-full table-checkout">
                        <thead>
                            <tr>
                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    No</th>
                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    User</th>
                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    Bukti Pembayaran</th>
                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    Produk</th>
                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    Total</th>
                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    Tanggal Antar</th>
                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    Alamat</th>
                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    Telepon</th>
                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    Status</th>
                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    Action</th>
                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    Konfirmasi/Tolak</th>
                            </tr>
                        </thead>
                    </table>

                    <script type="text/javascript">
                        $(function() {
                            var table = $('.table-checkout').DataTable({
                                processing: true,
                                serverSide: true,
                                ajax: "{{ route('checkout.index') }}",
                                columns: [{
                                        data: 'DT_RowIndex',
                                        name: 'DT_RowIndex',
                                        orderable: false,
                                        searchable: false
                                    },
                                    {
                                        data: 'user',
                                        name: 'user'
                                    },
                                    {
                                        data: 'bukti_pembayaran',
                                        name: 'bukti_pembayaran',
                                        render: function(data, type, row) {
                                            return `<img src="{{ asset('storage/${data}') }}" alt="Bukti Pembayaran" class="w-20 h-auto">`;
                                        }
                                    },
                                    {
                                        data: 'product',
                                        name: 'product'
                                    },
                                    {
                                        data: 'total',
                                        name: 'total'
                                    },
                                    {
                                        data: 'tanggal_antar',
                                        name: 'tanggal_antar'
                                    },
                                    {
                                        data: 'alamat',
                                        name: 'alamat'
                                    },
                                    {
                                        data: 'no_hp',
                                        name: 'no_hp'
                                    },
                                    {
                                        data: 'status',
                                        name: 'status'
                                    },
                                    {
                                        data: 'id',
                                        name: 'id',
                                        render: function(data, type, row) {
                                            return `
                                            <form action="/checkout/${data}/delete" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a href="/checkout/${data}/edit" class="edit btn btn-primary btn-sm">Edit</a>
                                                <button class="delete btn btn-sm bg-red-500 text-white transition-all hover:bg-red-700" type="submit">Hapus</button>
                                            </form>`;
                                        },
                                        orderable: false,
                                        searchable: false
                                    },
                                    {
                                        data: 'id',
                                        name: 'id',
                                        render: function(data, type, row) {
                                            if (row.status === 'Menunggu Pembatalan') {
                                                return `
                                                <form action="/checkout/${data}/confirm" method="POST" class="inline">
                                                    @csrf
                                                    <button type="submit" class="delete btn btn-sm bg-green-500 text-white transition-all hover:bg-green-700">Konfirmasi</button>
                                                </form>
                                                <form action="/checkout/${data}/reject" method="POST" class="inline">
                                                    @csrf
                                                    <button type="submit" class="delete btn btn-sm bg-red-500 text-white transition-all hover:bg-red-700">Tolak</button>
                                                </form>`;
                                            }
                                            return '-';
                                        },
                                        orderable: false,
                                        searchable: false
                                    }
                                ],
                            });
                        });
                    </script>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-between text-lg text-gray-400 px-3 py-2 bg-white mx-6 rounded-lg">
            <h1>Total Keseluruhan</h1>
            <div class="text-black">
                <h1>{{ $data }}</h1>
            </div>
        </div>
    </div>
@endsection
