<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\archive;

class DashboardController extends Controller
{
    public function index()
    {
        // $datas = archive::all();
        // return view('pages.dashboardAdmin.artikel.artikel', [
        //     "datas" => $datas
        // ]);
        return view('MainWebsite.Dashboard.Index');
    }
}
