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
                  <h1 class="mt-3 ml-3">Tambah Produk</h1>

                  <div class="card-body">
                      <form action="{{route('produk.store')}}" method="post" enctype="multipart/form-data">
                          @csrf
                      <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="namaProduk" class="form-label">Nama Produk</label>
                              <input type="text" name="namaProduk" class="form-control" placeholder="Nama Produk">
                                  @error('namaProduk')
                                  <span class="text-danger">{{$message}}</span>
                                  @enderror
                              </div>
                              <div class="form-group">
                                  <label for="stok" class="form-label">Stok</label>
                                  <input type="number" name="stok" class="form-control" placeholder="Stok">
                                  @error('stok')
                                  <span class="text-danger">{{$message}}</span>
                                  @enderror
                              </div>
                              <div class="form-group">
                                  <label for="harga" class="form-label">harga</label>
                                  <input type="number" name="harga" class="form-control" placeholder="harga">
                                  @error('harga')
                                  <span class="text-danger">{{$message}}</span>
                                  @enderror
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="jenisProduk" class="form-label">Jenis Produk</label>
                                  <select name="jenisProduk" class="form-control">
                                      <option value="0">--Pilih--</option>
                                      <option value="makananringan">makanan ringan</option>
                                      <option value="pewangi">pewangi</option>
                                      <option value="bumbumasakan">bumbu masakan</option>
                                  </select>
                                  @error('jenisProduk')
                                  <span class="text-danger">{{$message}}</span>
                                  @enderror
                              </div>
                              <div class="form-group">
                                  <label for="minStok" class="form-label">Minimal Stok</label>
                                  <input type="number" name="minStok" class="form-control" placeholder="Minimal stok">
                                  @error('minStok')
                                  <span class="text-danger">{{$message}}</span>
                                  @enderror
                              </div>
                              <div class="form-group">
                                  <label for="satuan" class="form-label">satuan</label>
                                  <input type="text" name="satuan" class="form-control" placeholder="satuan">
                                  @error('satuan')
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
@push('modals')

@endpush
