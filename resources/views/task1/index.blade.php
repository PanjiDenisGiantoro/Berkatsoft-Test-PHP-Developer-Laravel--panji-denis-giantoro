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
                          Boolean containLetters(string firstWord, string secondWord)
                      </p>
                      <p>
                          brs and berkatsoft
                      </p>
                  </div>
                  <div class="card-body">
                      <form action="{{route('task1.cek')}}" method="post" enctype="multipart/form-data">
                          @csrf
                      <div class="row">
                          <div class="col-md-6">
                              <input type="text" name="firstword" class="form-control firstword" placeholder="first word">

                          </div>
                          <div class="col-md-6">
                              <input type="text" name="secondword" class="form-control secondword" placeholder="second word">

                          </div>
                          <div class="mt-3 w-20 text-center">
                          <button type="submit" class="btn btn-lg btn-primary submit">submit</button>
                          </div>
                      </div>

                      </form>

                  </div>

              </div>
            </div>
        </div>
    </div>
</x-app-layout>
