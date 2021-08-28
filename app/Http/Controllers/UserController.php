<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;



class UserController extends Controller
{
    public function index_view ()
    {
        return view('pages.user.user-data', [
            'user' => User::class
        ]);
    }
    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
