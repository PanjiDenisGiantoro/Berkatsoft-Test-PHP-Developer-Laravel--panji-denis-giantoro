<?php

namespace App\Exports;

use App\Models\Outlet;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class UsersExport1 implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('exports.invoices', [
            'users' => User::all()
        ]);
    }
}
