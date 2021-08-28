<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\DataTables;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('customer.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        return view('customer.listcustomer');
    }
    public function getListCustomer()
    {
        return DataTables::of(Customer::query())
            ->addColumn('lihat', function($data) {
                return "<a class='btn btn-sm btn-info text-white' href='".route('customer.edit', $data->id)."'>update</a>
                        <a class='btn btn-sm btn-danger text-white' href='".route('customer.destroy', $data->id)."'>delete</a>";
            })
            ->rawColumns(['lihat'])
            ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'namaCustomer' => 'required',
            'alamat' => 'required',
            'jenisKelamin' => 'required',
            'notelp' => 'required',
        ]);

        $customer = Customer::where('namaCustomer', '=',  $request->namaCustomer)->count();
        if ($customer >= 1){
            Alert::warning('Nama Customer Sama', 'Warning Message');
            return redirect()->back();
        }
        else {
            $formdata =array(
                'namaCustomer' => $request->namaCustomer,
                'alamat' => $request->alamat,
                'jenis_kelamin' => $request->jenisKelamin,
                'notelp' => $request->notelp,
            );
            Customer::create($formdata);
            alert()->success('SuccessAlert','Sukses');
            return redirect('/list/customer');
        }




    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $data = DB::table('customers')
            ->where('id','=',$request->id)
            ->first();
        return view('customer.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'namaCustomer' => 'required',
            'alamat' => 'required',
            'jenisKelamin' => 'required',
            'notelp' => 'required',
        ]);

            $formdata =array(
                'namaCustomer' => $request->namaCustomer,
                'alamat' => $request->alamat,
                'jenis_kelamin' => $request->jenisKelamin,
                'notelp' => $request->notelp,
            );
            Customer::where('id',$request->id)->update($formdata);
            alert()->success('SuccessAlert','Sukses ter update');
            return redirect('/list/customer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        DB::table('products')->where('slug', $request->id)->delete();
        alert()->success('SuccessAlert','Sukses terhapus');

        return redirect()->back();
    }
}
