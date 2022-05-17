<?php

namespace App\Http\Controllers;

use App\Models\LokerData;
use App\Models\LokerLamaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LokerController extends Controller
{
    public function index()
    {
        $loker = LokerData::where('publish', 'y')->get();

        $lamaran = LokerLamaran::where('email', Auth::user()->email)->get();

        return view('pages.loker.index', ['lokers' => $loker, 'lamarans' => $lamaran]);
    }

    public function store(Request $request)
    {
        $loker = new LokerLamaran;
        $loker->email = $request->email;
        $loker->cabang = $request->cabang;
        $loker->lokasi = $request->lokasi;
        $loker->jabatan = $request->jabatan;
        $loker->loker_data_id = $request->id;
        $loker->status = "cek berkas";
        $loker->save();

        return response()->json([
            'status' => 'true'
        ]);
    }

    public function show($id)
    {
        $loker = LokerData::find($id);

        return response()->json([
            'loker' => $loker
        ]);
    }
}
