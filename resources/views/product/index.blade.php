@extends('layouts.main')

@section('content')
    <div class="flex-1  overflow-x-hidden overflow-y-auto  ">

        <div class="container px-6 py-8 mx-auto">
            <a href="{{ route('product.create') }}">
                <button type="button"
                    class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-base px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Create
                    Product</button>
            </a>
            <div class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                <table class="w-full table-product">
                    <thead>
                        <tr>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                No</th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Nama Product</th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Price</th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Catagory</th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Image</th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Action</th>
                        </tr>
                    </thead>
                </table>

                <script type="text/javascript">
                    $(function() {

                        var table = $('.table-product').DataTable({
                            processing: true,
                            serverSide: true,
                            ajax: "{{ route('product.index') }}",
                            // columnDefs: [{
                            //     targets: 4,
                            //     data: 'image',
                            //     render: function(data, type, row, meta) {
                            //         return `<img src="{{ asset('image/') }}${data}" alt="Image" width="50">`;

                            //     }
                            // }],

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
                                    data: 'price',
                                    name: 'price'
                                },
                                {
                                    data: 'catagory',
                                    name: 'catagory',
                                },
                                {
                                    data: 'image',
                                    name: 'image',
                                    render: function(data, type, row, meta) {
                                        return `<img src="{{ asset('/') }}${data}" alt="Image" width="50">`;
                                    }
                                },
                                {
                                    data: 'action',
                                    name: 'action',
                                    orderable: false,
                                    searchable: false
                                },
                            ],
                        });

                    });
                </script>

            </div>

        </div>
    </div>
@endsection