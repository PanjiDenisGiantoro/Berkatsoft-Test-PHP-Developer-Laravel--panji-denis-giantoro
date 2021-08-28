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
                      customer
                  </div>
                  <h1 class="mt-3 ml-3">List Customer</h1>
                  <div class="col-md-3 ml-3">
                  <a href="{{route('customer.index')}}" class="btn btn-primary" >Tambah customer</a>
                  </div>
                  <div class="card-body">
                      <div class="table-responsive">
                          <table class="table" id="supplierTable11" style="width:100%">
                              <thead>
                              <tr>
                                  <th scope="col">Nama customer</th>
                                  <th scope="col">no Telepon</th>
                                  <th scope="col">alamat</th>
                                  <th scope="col">Jenis Kelamin</th>
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
        $('#supplierTable11').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('customer.getlistcustomer') }}',
            columns: [
                { data: 'namaCustomer', name: 'namaCustomer' },
                { data: 'notelp', name: 'notelp' },
                { data: 'alamat', name: 'alamat' },
                { data: 'jenis_kelamin', name: 'jenis_kelamin' },
                { data: 'lihat', name: 'lihat' },
            ]
        });
    });
</script>
