@extends('layouts.main')

@section('content')
    <div class="flex-1  overflow-x-hidden overflow-y-auto  ">

        <div class="container px-6 py-8 mx-auto">
            <div class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
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
                                Metode Pembayaran</th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Total</th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                               Bukti Pembayaran</th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                               Status</th>

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
                                    data: 'id_metodePembayaran',
                                    name: 'id_metodePembayaran'
                                },
                                {
                                    data: 'total',
                                    name: 'total'
                                },
                                {
                                    data: 'bukti_pembayaran',
                                    name: 'bukti_pembayaran'
                                },
                                {
                                    data: 'status',
                                    name: 'status'
                                },
                            ],
                        });

                    });
                </script>
            </div>
        </div>

            <div class="flex items-center justify-between text-lg text-gray-400 px-3 py-2 bg-white mx-6  rounded-lg">
            <h1 class="">Total Keseluruhan</h1>
            <div class="text-black">
                <h1>{{$data}}</h1>
            </div>

        </div>
    </div>
@endsection
