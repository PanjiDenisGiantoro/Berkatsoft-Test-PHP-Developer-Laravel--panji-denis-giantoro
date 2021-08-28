<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
              <div class="card ">
                  <div class="card-header bg-dark text-white">
                      Produk
                  </div>
                  <h1 class="mt-3 ml-3">List Produk</h1>
                  <div class="col-md-3 ml-3">
                  <a href="{{route('produk.index')}}" class="btn btn-primary" >Tambah Produk</a>
                  </div>
                  <div class="card-body">
                      <div class="table-responsive">
                          <table class="table" id="supplierTable1" style="width:100%">
                              <thead>
                              <tr>
                                  <th scope="col">Nama Produk</th>
                                  <th scope="col">Jenis Produk</th>
                                  <th scope="col">Stok</th>
                                  <th scope="col">Min Stok</th>
                                  <th scope="col">Harga</th>
                                  <th scope="col">satuan</th>
                                  <th scope="col">Aksi</th>
                              </tr>
                              </thead>
                              <tbody>

                              </tbody>
                          </table>
                      </div>

                  </div>

              </div>
            </div>
        </div>
    </div>

</x-app-layout>
<script>
    $(function() {
        $('#supplierTable1').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('produk.getlistproduk') }}',
            columns: [
                { data: 'namaProduk', name: 'namaProduk' },
                { data: 'jenisProduk', name: 'jenisProduk' },
                { data: 'Stok', name: 'Stok' },
                { data: 'minStok', name: 'minStok' },
                { data: 'harga', name: 'harga' },
                { data: 'satuan', name: 'satuan' },
                { data: 'lihat', name: 'lihat' },
            ]
        });
    });
</script>
