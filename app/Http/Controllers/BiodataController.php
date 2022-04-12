<?php

namespace App\Http\Controllers;

use App\Models\HcLamaran;
use Illuminate\Http\Request;

class BiodataController extends Controller
{
    public function index()
    {
        return view('pages.biodata.index');
    }

    public function biodata($id)
    {
        $biodata = HcLamaran::find($id);

        return response()->json([
            'biodatas' => $biodata
        ]);
    }
}
