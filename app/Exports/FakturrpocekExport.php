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

class FakturrpocekExport implements FromView,ShouldAutoSize,WithStyles
{

    protected $awal;
    protected $akhir;

    function __construct($awal,$akhir) {
        $this->awal = $awal;
        $this->akhir = $akhir;
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $awal = $this->awal;
        $akhir = $this->akhir;
        $PDFReport = DB::select("SELECT outlets.namaOutlet,fakturs.invoice,fakturs.grandTotal,faktur_barangs.laba,faktur_barangs.HPP,fakturs.id FROM outlets JOIN fakturs ON fakturs.outlet_id = outlets.id
                JOIN faktur_barangs ON faktur_barangs.faktur_id = fakturs.invoice
                JOIN goods ON goods.id = faktur_barangs.idBarang where fakturs.tanggal between  '$awal' and '$akhir'group by fakturs.invoice order by invoice desc");

        $jumlah = DB::select("Select SUM(fakturs.`grandTotal`) AS jum FROM outlets JOIN fakturs ON fakturs.outlet_id = outlets.id
                JOIN faktur_barangs ON faktur_barangs.faktur_id = fakturs.invoice
                JOIN goods ON goods.id = faktur_barangs.idBarang where fakturs.tanggal between  '$awal' and '$akhir' order by invoice desc");

        return view('laporan1.o1',compact('PDFReport','jumlah','awal','akhir'));
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
