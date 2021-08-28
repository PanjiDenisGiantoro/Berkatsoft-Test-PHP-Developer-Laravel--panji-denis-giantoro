<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('produk.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        return view('produk.list');
    }
    public function getListProduk()
    {
        return DataTables::of(Product::query())
            ->addColumn('lihat', function($data) {
                return "<a class='btn btn-sm btn-info text-white' href='".route('produk.edit', $data->slug)."'>update</a>
                        <a class='btn btn-sm btn-danger text-white' href='".route('produk.destroy', $data->slug)."'>delete</a>";
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
            'namaProduk' => 'required',
            'jenisProduk' => 'required',
            'minStok' => 'required',
            'stok' => 'required',
            'harga' => 'required',
            'satuan' => 'required',
        ]);

        $produk = Product::where('namaProduk', '=',  $request->namaProduk)->count();
        if ($produk >= 1){
            Alert::warning('Nama Produk Sama', 'Warning Message');
            return redirect()->back();
        }
        else {
            $formdata =array(
                'slug' => Str::slug($request->namaProduk).'-'.Str::random(5),
                'namaProduk' => $request->namaProduk,
                'jenisProduk' => $request->jenisProduk,
                'minStok' => $request->minStok,
                'stok' => $request->stok,
                'harga' => $request->harga,
                'satuan' => $request->satuan,
            );
            Product::create($formdata);
            alert()->success('SuccessAlert','Sukses');
            return redirect('/list/product');
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
        $data = DB::table('products')
            ->where('slug','=',$request->id)
            ->first();
        return view('produk.edit',compact('data'));
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
            'namaProduk' => 'required',
            'jenisProduk' => 'required',
            'minStok' => 'required',
            'stok' => 'required',
            'harga' => 'required',
            'satuan' => 'required',
        ]);


            $formdata =array(
                'slug' => Str::slug($request->namaProduk).'-'.Str::random(5),
                'namaProduk' => $request->namaProduk,
                'jenisProduk' => $request->jenisProduk,
                'minStok' => $request->minStok,
                'stok' => $request->stok,
                'harga' => $request->harga,
                'satuan' => $request->satuan,
            );
            Product::where('slug',$request->id)->update($formdata);
            alert()->success('SuccessAlert','Sukses ter update');
            return redirect('/list/product');
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
