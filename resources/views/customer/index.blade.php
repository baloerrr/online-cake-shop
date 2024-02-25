@extends('layouts.main')

@section('content')
    <div class="flex-1  overflow-x-hidden overflow-y-auto  ">
        <div class="container px-6 py-8 mx-auto">

            <div
                class="p-2 inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                <table class="min-w-full table-customer ">
                    <thead>
                        <tr>
                            <th
                                class=" text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                No</th>
                            <th
                                class=" text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Name</th>
                            <th
                                class=" text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Email</th>
                            <th
                                class=" text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Alamat</th>
                            <th
                                class=" text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Nomor Telepon</th>

                        </tr>
                    </thead>
                </table>
                <script type="text/javascript">
                    $(function() {

                        var table = $('.table-customer').DataTable({
                            processing: true,
                            serverSide: true,
                            ajax: "{{ route('customer.index') }}",
                            columns: [{
                                    data: 'DT_RowIndex',
                                    name: 'DT_RowIndex',
                                    orderable: false,
                                    searchable: false
                                },
                                {
                                    data: 'name',
                                    name: 'name'
                                },
                                {
                                    data: 'email',
                                    name: 'email'
                                },
                                {
                                    data: 'alamat',
                                    name: 'alamat'
                                },
                                {
                                    data: 'no_hp',
                                    name: 'no_hp'
                                },

                            ]
                        });

                    });
                </script>
            </div>

        </div>
    </div>
@endsection
