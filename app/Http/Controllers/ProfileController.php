<?php

namespace App\Http\Controllers;

use App\Models\LokerBiodata;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function biodata(Request $request)
    {
        $biodata = LokerBiodata::where('email', $request->email)->first();

        return response()->json([
            'biodatas' => $biodata
        ]);
    }

    public function biodataUpdate(Request $request)
    {

    }
}
