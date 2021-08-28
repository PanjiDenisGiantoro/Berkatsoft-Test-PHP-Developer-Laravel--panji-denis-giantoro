<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\Product;
use App\Models\Promo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = Product::all();
        $customer = Customer::all();
        return view('orders.index',compact('produk','customer'));
    }
    public function getService(Request $request)
    {
        $cities = DB::table("customers")
            ->where("id",$request->country_id)->get();
        return response()->json($cities);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::transaction(function () use ($request){

            $order = new Order;
            $order->id_customer = $request->customer;
            $order->paid_amount = $request->paid_amount;
            $order->balance = $request->balance;
            $order->tanggalTransaksi = date('Y-m-d');
            $order->user_id = $request->user()->id;
            $order->save();
            $order_id = $order->id;


            for ($produk_id=0;$produk_id < count($request->produk_id);$produk_id++){
                $orderdetail = new Orderdetail;
                $orderdetail->order_id = $order_id;
                $orderdetail->produk_id = $request->produk_id[$produk_id];
                $orderdetail->qty = $request->qty[$produk_id];
                $orderdetail->harga = $request->harga[$produk_id];
                $orderdetail->amount = $request->total_amount[$produk_id];
                $orderdetail->save();
            }

            alert()->success('SuccessAlert','Sukses');
            return redirect()->back();
        });
        alert()->success('SuccessAlert','Sukses');
        return redirect()->back();
    }

    public function view(){
        return view('orders.view');
    }
    public function getlist()
    {
        $customers = Order::all();
        return Datatables::of($customers)

            ->addColumn('details_url', function($customer) {
                return route('order.master_single_details', $customer->id);
            })
            ->make(true);
    }
    public function getMasterDetailsSingleData($id)
    {
        $purchases = DB::table('orders')
            ->join('orderdetails','orders.id','=','orderdetails.order_id')
            ->where('orderdetails.order_id','=',$id);

        return Datatables::of($purchases)->make(true);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
