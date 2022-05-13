<?php

namespace App\Http\Controllers;

use App\Models\LokerData;
use App\Models\MasterCabang;
use App\Models\MasterJabatan;
use Illuminate\Http\Request;

class LokerController extends Controller
{
    public function index()
    {
        $loker = LokerData::get();

        return view('pages.loker.index');
    }
}
