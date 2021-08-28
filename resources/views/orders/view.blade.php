<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <style>
        td.details-control {
            background: url('assets/details_open.png') no-repeat center center;
            cursor: pointer;
        }
        tr.shown td.details-control {
            background: url('assets/details_close.png') no-repeat center center;
        }
    </style>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4> List order</h4>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{route('order.index')}}" class="btn btn-primary">tambah order</a>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="customers-table1">
                                    <thead>
                                    <tr>
                                        <th>+</th>
                                        <th>tanggal order</th>
                                        <th>customer</th>
                                        <th>paid amount</th>
                                        <th>user_id</th>
                                        <th>balance</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<script src="https://datatables.yajrabox.com/js/handlebars.js"></script>

<script id="details-template" type="text/x-handlebars-template">
    @verbatim
    <div class="label label-info">id <b> {{ id }}</b></div>
    <table class="table details-table" id="purchases-{{id}}">
        <thead>
        <tr>
            <th>Id</th>
            <th>produk</th>
            <th>qty</th>
            <th>diskon</th>
            <th>harga</th>
            <th>jumlah harga</th>
        </tr>
        </thead>
    </table>
    @endverbatim
</script>

<script>
    var template = Handlebars.compile($("#details-template").html());
    var table = $('#customers-table1').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('order.master_details') }}',
        columns: [
            {
                "className":      'details-control',
                "orderable":      false,
                "searchable":     false,
                "data":           null,
                "defaultContent": ''
            },
            { data: 'tanggalTransaksi', name: 'tanggalTransaksi' },
            { data: 'id_customer', name: 'id_customer' },
            { data: 'paid_amount', name: 'paid_amount' },
            { data: 'user_id', name: 'user_id' },
            { data: 'balance', name: 'balance' },
        ],
        order: [[1, 'asc']]
    });
    // Add event listener for opening and closing details
    $('#customers-table1 tbody').on('click','td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row(tr);
        var tableId = 'purchases-' + row.data().id;
        if (row.child.isShown()) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        } else {
            // Open this row
            row.child(template(row.data())).show();
            initTable(tableId, row.data());
            console.log(row.data());
            tr.addClass('shown');
            tr.next().find('td').addClass('no-padding bg-gray');
        }
    });
    function initTable(tableId, data) {
        $('#' + tableId).DataTable({
            processing: true,
            "ordering": false,
            serverSide: true,
            ajax: data.details_url,
            columns: [
                { data: 'id', name: 'id' },
                { data: 'produk_id', name: 'produk_id' },
                { data: 'qty', name: 'qty'},
                { data: 'diskon', name: 'diskon'},
                { data: 'harga', name: 'harga'},
                { data: 'amount', name: 'amount'}
            ]
        })
    }
</script>
