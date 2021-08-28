<?php

namespace App\Http\Controllers;

use App\Models\Faktur;
use App\Models\Goods;
use App\Models\GrossExpense;
use App\Models\Outlet;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class DashboarController extends Controller
{
    //
    public function index()
    {
        $count = Goods::where('stok','>=','minStok')->count();
        $danger = Goods::where('stok','<=','minStok')->count();
        $All = Goods::all()->count();
        $outletR = Outlet::where('jenisOutlet','=','ramen')->count();
        $outletk = Outlet::where('jenisOutlet','=','kopi')->count();
        $outletm = Outlet::where('jenisOutlet','=','martabak')->count();
        $outletn = Outlet::where('jenisOutlet','=','nasiGoreng')->count();
        $label         = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
        for($bulan=1;$bulan < 13;$bulan++){
            $chartuser     = collect(DB::SELECT("SELECT count(invoice) AS jumlah from fakturs where month(tanggal)='$bulan'"))->first();
            $jumlah_user[] = $chartuser->jumlah;
        }
        $month = Carbon::now()->format('m');
        $year = Carbon::now()->format('Y');
        $pengeluaran = DB::table('gross_expenses')
            ->where('tanggalPengeluaran', 'like', $year.'-'.$month.'-%')
            ->sum('biayaPengeluaran');
        $daftarPengeluaran = GrossExpense::all()->take(5)->sortByDesc('tanggalPengeluaran');


        $data1 = DB::table('goods')
            ->join('faktur_barangs','faktur_barangs.idBarang','=','goods.id')
            ->join('fakturs','fakturs.id','=','faktur_barangs.faktur_id')
            ->groupBy('namaBarang')
            ->orderByRaw('sum(qty) DESC')
            ->take(5)
            ->selectRaw('namaBarang, SUM(qty) as qtt,stok')
            ->where('fakturs.tanggal','like',$year.'-'.$month.'-%')
            ->get();
        $dt1 = Carbon::now('Asia/Jakarta');
        $last_month1 = $dt1->subMonth()->format('M');
        $dt = Carbon::now('Asia/Jakarta');
        $last_month = $dt->subMonth()->format('m');


        $data2 = DB::table('goods')
            ->join('faktur_barangs','faktur_barangs.idBarang','=','goods.id')
            ->join('fakturs','fakturs.id','=','faktur_barangs.faktur_id')
            ->groupBy('namaBarang')
            ->orderByRaw('sum(qty) DESC')
            ->take(5)
            ->selectRaw('namaBarang, SUM(qty) as qtt,stok')
            ->where('fakturs.tanggal','like',$year.'-'.$last_month.'-%')
            ->get();

        return view('dashboard',[
            'safe' => $count,
            'danger' => $danger,
            'all' => $All,
            'outletr' => $outletR,
            'outletn' => $outletn,
            'outletm' => $outletm,
            'outletk' => $outletk,
            'label' => $label,
            'jumlah_user' => $jumlah_user,
            'pengeluaran' => $pengeluaran,
            'daftarPengeluaran' => $daftarPengeluaran,
            'datatopnow' => $data1,
            'datatopold' => $data2,
            'bulanlalu' => $last_month1,
            'tahun' => $year,
        ]);
    }
    public function getlist()
    {
        $month = Carbon::now()->format('m');
        $year = Carbon::now()->format('Y');
        $faktur = DB::table('fakturs')
            ->join('outlets','outlets.id','=','fakturs.outlet_id')
            ->select('invoice','namaOutlet','tanggal','grandTotal')
            ->where('tanggal','like',$year.'-'.$month.'-%')
            ->orderByDesc('invoice')
            ->get();
        return Datatables::of($faktur)

            ->make(true);
    }

}
