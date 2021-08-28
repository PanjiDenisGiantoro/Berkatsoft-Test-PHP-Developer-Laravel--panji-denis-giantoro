<x-app-layout>
    <x-slot name="header_content">
        <h1>Dashboard</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Layout</a></div>
            <div class="breadcrumb-item">Default Layout</div>
        </div>
    </x-slot>
    <style type="text/css">
        .s{
            width: 100%;
            height: 500px;
            padding: 10px;
        }.scroll{
             background: white;
             width: 100%;
             height: 100%;
             overflow: auto;
             font-size: 20px;
             padding: 5px;

         }
         </style>
        <section class="section">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="card card-statistic-2">
                        <div class="card-stats">
                            <div class="card-stats-title">Stok Barang

                            </div>
                            <div class="card-stats-items">
                                <div class="card-stats-item">
                                    <div class="card-stats-item-count">{{$all}}</div>
                                    <div class="card-stats-item-label">ALL</div>
                                </div>
                                <div class="card-stats-item">
                                    <div class="card-stats-item-count">{{$safe}}</div>
                                    <div class="card-stats-item-label">SAFE</div>
                                </div>
                                <div class="card-stats-item">
                                    <div class="card-stats-item-count">{{$danger}}</div>
                                    <div class="card-stats-item-label">DANGER</div>
                                </div>
                            </div>
                        </div>
                        <div class="card-icon shadow-primary bg-primary">
                            <a href="/barang1/daftar-stok" class="btn btn-primary" style="width: 100pt"><b>DAFTAR STOK</b></a>
                        </div>
                        <div class="card-wrap">

                            <div class="card-body">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="card card-statistic-2">
                        <div class="card-stats">
                            <div class="card-stats-title">Daftar Outlet

                            </div>
                            <div class="card-stats-items">
                                <div class="card-stats-item">
                                    <div class="card-stats-item-count">{{$outletr}}</div>
                                    <div class="card-stats-item-label">Outlet Ramen</div>
                                </div>
                                <div class="card-stats-item">
                                    <div class="card-stats-item-count">{{$outletm}}</div>
                                    <div class="card-stats-item-label">Outlet Martabak</div>
                                </div>
                                <div class="card-stats-item">
                                    <div class="card-stats-item-count">{{$outletn}}</div>
                                    <div class="card-stats-item-label">Outlet Nasi Goreng</div>
                                </div>
                                <div class="card-stats-item">
                                    <div class="card-stats-item-count">{{$outletk}}</div>
                                    <div class="card-stats-item-label">Outlet Kopi</div>
                                </div>
                            </div>
                        </div>
                        <div class="card-icon shadow-primary bg-primary">
                            <a href="/outlet" class="btn btn-primary" style="width: 100pt"><b>DAFTAR Outlet</b></a>
                        </div>
                        <div class="card-wrap">

                            <div class="card-body">

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Sales tahun {{$tahun}}</h4>
                        </div>
                        <div class="card-body">
{{--                            <canvas id="container" height="158"></canvas>--}}
                            <canvas id="mataChart" class="chartjs" width="undefined"height="100"></canvas>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card gradient-bottom">

                        <div class="card-header">
                            <div class="row">
                                <div class="col-6">

                                    <h4>Top 5 Products</h4>
                                </div>
                                <div class="col-6 left-4/12" >
                                    <div class="card-icon shadow-primary bg-primary">
                                        <a href="/barang/daftar-stok" class="btn btn-primary" style="width: 100pt"><b>DAFTAR STOK</b></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="card-body" id="top-5-scroll">
                                    <ul class="list-unstyled list-unstyled-border">
                                        <li class="media">
                                            <div class="media-body">
                                                <h4>Bulan ini ({{date('M')}})</h4>
                                                @foreach($datatopnow as $now)
                                                <div class="media-title">{{$now->namaBarang}}</div>
                                                <div class="mt-1">
                                                    <div class="budget-price">
                                                        <div class="budget-price-label">sold out</div>
                                                        <div class="budget-price-label">{{$now->qtt}}</div>
                                                    </div>
                                                </div>
                                                    @endforeach
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card-body" id="top-5-scroll">
                                    <ul class="list-unstyled list-unstyled-border">
                                        <li class="media">
                                            <div class="media-body">
                                                <h4>Bulan lalu ({{$bulanlalu}})</h4>
                                                @foreach($datatopold as $now1)
                                                    <div class="media-title">{{$now1->namaBarang}}</div>
                                                    <div class="mt-1">
                                                        <div class="budget-price">
                                                            <div class="budget-price-label">sold out</div>
                                                            <div class="budget-price-label">{{$now1->qtt}}</div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer pt-3 d-flex justify-content-center">


                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Invoices</h4>
                            <div class="card-header-action">
                                <a href="/faktu" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive table-invoice">
                                <table class="table table-striped" id="fak">
                                    <thead class="text-primary">
                                    <tr>
                                        <th>Invoice</th>
                                        <th>Outlet</th>
                                        <th>tanggal</th>
                                        <th>Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-hero">
                        <div class="card-header">
                            <div class="card-icon">
                                <i class="far fa-question-circle"></i>
                            </div>

                            <h4>Rp.{{number_format($pengeluaran,0, ',' , '.')}}
                                </h4>
                            <div class="card-description">Pengeluaran kotor bulan sekarang</div>
                            <div class="card-header-action">
                                <a href="/PengeluaranKotor" class="btn btn-danger">View More Pengeluaran<i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="tickets-list">
                                <div class="s">
                                    <div class="scroll" id="scroll">
                                @foreach($daftarPengeluaran as $daftarPengeluarans)
                                <a href="#" class="ticket-item">
                                    <div class="ticket-title">
                                        <h2>{{$daftarPengeluarans->namaPengeluaran}}</h2>
                                    </div>
                                    <div class="ticket-info">
                                        <div><h3>{{$daftarPengeluarans->biayaPengeluaran}}</h3></div>
                                        <div class="bullet"></div>
                                        <div class="text-primary"><h3>{{$daftarPengeluarans->tanggalPengeluaran}}</h3></div>
                                    </div>
                                </a>
                                @endforeach


                            </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <script src="{{ asset('stisla/js/modules/jquery.min.js') }}"></script>
    <script  src="{{ asset('stisla/js/chart.js') }}"></script>

    <script>
        $(function() {
            $('#fak').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('dashboard.getlist') }}',
                columns: [
                    { data: 'invoice', name: 'invoice' },
                    { data: 'namaOutlet', name: 'namaOutlet' },
                    { data: 'tanggal', name: 'tanggal' },
                    { data: 'grandTotal', name: 'grandTotal' }
                    ]
            });
        });
    </script>
    <script type="text/javascript">
        var ctx = document.getElementById("mataChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: <?php echo json_encode($label); ?>,
                datasets: [{
                    label: 'Jumlah Invoice',
                    backgroundColor: '#ADD8E6',
                    borderColor: '#93C3D2',
                    data: <?php echo json_encode($jumlah_user); ?>
                }],
                options: {
                    animation: {
                        onProgress: function(animation) {
                            progress.value = animation.animationObject.currentStep / animation.animationObject.numSteps;
                        }
                    }
                }
            },
        });
    </script>
</x-app-layout>
