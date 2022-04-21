<?php

namespace App\Http\Controllers;

use App\Models\LokerBiodata;
use App\Models\LokerUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $messages = [
            'nama_lengkap.required' => 'Nama lengkap harus diisi',
            'nama_panggilan.required' => 'Nama panggilan harus diisi',
            'telepon.required' => 'Telepon harus diisi',
            'telepon.max' => 'Telepon diisi maksimal 15 karakter',
            'nomor_ktp.required' => 'Nomor KTP harus diisi',
            'nomor_ktp.max' => 'Nomor KTP diisi maksimal 16 karakter',
            'status_kawin.required' => 'Status perkawinan harus diisi',
            'agama.required' => 'Agama harus diisi',
            'agama.max' => 'Agama diisi maksimal 10 karakter',
            'gender.required' => 'Jenis kelamin harus diisi',
            'gender.max' => 'Jenis kelamin diisi maksimal 1 karakter',
            'tempat_lahir.required' => 'Tempat lahir harus diisi',
            'tempat_lahir.max' => 'Tempat lahir diisi maksimal 30 karakter',
            'tanggal_lahir.required' => 'Tanggal lahir harus diisi',
            'tanggal_lahir.date' => 'Tanggal lahir harus diisi dengan tipe date',
            'alamat_asal.required' => 'Alamat asal harus diisi',
            'alamat_domisili.required' => 'Alamat domisili harus diisi',
            'penghasilan_ortu.required' => 'Penghasilan Orang Tua harus diisi'
        ];

        $validator = Validator::make($request->all(), [
            'nama_lengkap' => 'required',
            'nama_panggilan' => 'required',
            'telepon' => 'required|max:15',
            'nomor_ktp' => 'required|max:16',
            'status_kawin' => 'required',
            'agama' => 'required|max:10',
            'gender' => 'required|max:1',
            'tempat_lahir' => 'required|max:30',
            'tanggal_lahir' => 'required|date',
            'alamat_asal' => 'required',
            'alamat_domisili' => 'required',
            'penghasilan_ortu' => 'required'
        ], $messages);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()
            ]);
        } else {
            $penghasilan_ortu = str_replace(".", "", $request->penghasilan_ortu);

            $biodata = LokerBiodata::where('email', $request->id)->first();
            $biodata->nama_lengkap = $request->nama_lengkap;
            $biodata->nama_panggilan = $request->nama_panggilan;
            $biodata->telepon = $request->telepon;
            $biodata->nomor_ktp = $request->nomor_ktp;
            $biodata->status_kawin = $request->status_kawin;
            $biodata->jenis_sim = $request->jenis_sim;
            $biodata->nomor_sim = $request->nomor_sim;
            $biodata->agama = $request->agama;
            $biodata->gender = $request->gender;
            $biodata->tempat_lahir = $request->tempat_lahir;
            $biodata->tanggal_lahir = $request->tanggal_lahir;
            $biodata->alamat_asal = $request->alamat_asal;
            $biodata->alamat_domisili = $request->alamat_domisili;
            $biodata->penghasilan_ortu = $penghasilan_ortu;
            $biodata->save();

            $user = LokerUser::where('email', $request->id)->first();
            $user->name = $request->nama_panggilan;
            $user->save();

            return response()->json([
                'status' => 200,
                'message' => "Data berhasil ditambahkan"
            ]);
        }
    }
}
