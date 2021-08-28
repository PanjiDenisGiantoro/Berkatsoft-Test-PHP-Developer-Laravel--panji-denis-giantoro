<?php

namespace App\Http\Livewire\Faktur;

use App\Models\Outlet;
use App\Models\Faktur;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class FakturIndex extends Component
{

    public function render()
    {
        $date1 = date('d-m-Y');
        $AWAL = 'ADS';
        $bulanRomawi = array("", "I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
        $dd = DB::select('SELECT MAX(SUBSTR(invoice,1,4)) as id FROM fakturs ');
       $noUrutAkhir = DB::table('fakturs')->max('id');
       $no = 1;
       if(date('d') === 1) {
           $ok= "" . sprintf("%04s", $no). '/' . $AWAL .'/' . $bulanRomawi[date('n')] .'/' . date('Y');
       }
       else {
           $ok= "" . sprintf("%04s", abs($noUrutAkhir + 1)). '/' . $AWAL .'/' . $bulanRomawi[date('n')] .'/' . date('Y');
       }
        $o = 1;
        $data1 = Faktur::max('id');
        $data2 = $data1 + (int)$o;
        $selectOutlet = Outlet::all();
        return view('livewire..faktur.faktur-index', ['outlet' => $selectOutlet,'ok' =>$ok,'data2'=>$data2,'date' => $date1]);
    }



}
