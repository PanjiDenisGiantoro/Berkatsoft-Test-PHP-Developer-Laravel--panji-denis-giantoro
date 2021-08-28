<?php

namespace App\Exports;

use App\Models\Outlet;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;

class UsersExport implements FromView,ShouldAutoSize,WithStyles
{

    protected $id;

    function __construct($id) {
        $this->id = $id;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $data = DB::table('outlets')->join('fakturs','fakturs.outlet_id','=','outlets.id')
            ->join('faktur_barangs','faktur_barangs.faktur_id','=','fakturs.invoice')
            ->join('goods','goods.id','=','faktur_barangs.idBarang')
            ->select('outlets.namaOutlet','fakturs.invoice','fakturs.grandTotal','faktur_barangs.laba','faktur_barangs.HPP','fakturs.id','fakturs.tanggal','fakturs.diskon')
            ->where('fakturs.id','=',$this->id)->first();

        $databarang = DB::select("SELECT goods.namaBarang,goods.satuan,faktur_barangs.qty,goods_prices.hargaJual,faktur_barangs.jumlah_harga,fakturs.grandTotal,faktur_barangs.laba,faktur_barangs.HPP,(faktur_barangs.`jumlah_harga`-faktur_barangs.`HPP`) AS selisih FROM fakturs
            JOIN faktur_barangs ON faktur_barangs.faktur_id = fakturs.invoice
            JOIN goods ON goods.id = faktur_barangs.idBarang
             JOIN goods_prices ON goods_prices.goods_id = goods.id  WHERE fakturs.id='$this->id' GROUP BY faktur_barangs.id");

        $jumlah = DB::select("SELECT COUNT(faktur_barangs.qty) AS tt FROM fakturs
            JOIN faktur_barangs ON faktur_barangs.faktur_id = fakturs.invoice
            JOIN goods ON goods.id = faktur_barangs.idBarang
             JOIN goods_prices ON goods_prices.goods_id = goods.id  WHERE fakturs.id='$this->id'");
        return view('exports.invoices',compact('data','databarang','jumlah'));
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.

            // Styling a specific cell by coordinate.
            'A4' => ['font' => ['bold' => true]],
            'B4' => ['font' => ['bold' => true]],
            'C4' => ['font' => ['bold' => true]],
            'D4' => ['font' => ['bold' => true]],
            'E4' => ['font' => ['bold' => true]],
            'F4' => ['font' => ['bold' => true]],
            'H4' => ['font' => ['bold' => true]],
            'I4' => ['font' => ['bold' => true]],
            'J4' => ['font' => ['bold' => true]],

        ];
        $event->sheet->getStyle('C8:W25')->applyFromArray([
            'borders' => [
                'outline' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => '000000'],
                ],
            ]
        ]);

    }


    }
