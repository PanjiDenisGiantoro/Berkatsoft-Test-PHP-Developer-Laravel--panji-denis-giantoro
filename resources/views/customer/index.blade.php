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
                  <h1 class="mt-3 ml-3">Tambah customer</h1>

                  <div class="card-body">
                      <form action="{{route('customer.store')}}" method="post" enctype="multipart/form-data">
                          @csrf
                      <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="namaCustomer" class="form-label">Nama Customer</label>
                              <input type="text" name="namaCustomer" class="form-control" placeholder="Nama Customer">
                                  @error('namaCustomer')
                                  <span class="text-danger">{{$message}}</span>
                                  @enderror
                              </div>
                              <div class="form-group">
                                  <label for="notelp" class="form-label">No. Telp</label>
                                  <input type="number" name="notelp" class="form-control" placeholder="No. Telp">
                                  @error('notelp')
                                  <span class="text-danger">{{$message}}</span>
                                  @enderror
                              </div>

                          </div>
                          <div class="col-md-6">

                              <div class="form-group">
                                  <label for="alamat" class="form-label">Alamat</label>
                                  <input type="text" name="alamat" class="form-control" placeholder="alamat">
                                  @error('alamat')
                                  <span class="text-danger">{{$message}}</span>
                                  @enderror
                              </div>
                              <div class="form-group">
                                  <label for="jenisKelamin" class="form-label mt-2">Jenis kelamin</label>
                                  <br>
                                  <input type="radio" value="laki-laki" name="jenisKelamin" class="form-check-input"> laki-laki
                                  <input type="radio" value="perempuan" name="jenisKelamin" class="form-check-input"> Perempuan
                                  @error('jenisKelamin')
                                  <span class="text-danger">{{$message}}</span>
                                  @enderror
                              </div>
                          </div>
                          <div class="mt-3 w-20 text-center">
                          <button type="submit" class="btn  btn-primary submit">Buat</button>
                          </div>
                      </div>

                      </form>

                  </div>

              </div>
            </div>
        </div>
    </div>
</x-app-layout>

