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
                      task 1
                  </div>
                  <div class="card-body bg-gray-200">
                      <h1>question</h1>
                      <p>
                          1 = true
                      </p>
                      <p>
                          null / kosong = false
                      </p>
                  </div>
                  <div class="card-body">

                      <input type="number" name="" id="" value="{{$bool}}">
                      <a href="{{url('task1')}}" class="btn btn-info">back</a>
                  </div>

              </div>
            </div>
        </div>
    </div>
</x-app-layout>
