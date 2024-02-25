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
                                Total</th>

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
                                    data: 'user_id',
                                    name: 'user_id'
                                },
                                {
                                    data: 'total',
                                    name: 'total'
                                },
                            ],
                        });

                    });
                </script>

            </div>

        </div>
    </div>
@endsection
