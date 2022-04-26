<?php

namespace App\Http\Controllers;

use App\Models\LokerBiodata;
use App\Models\LokerKerabatDarurat;
use App\Models\LokerMedsos;
use App\Models\LokerPendidikan;
use App\Models\LokerSebelumMenikah;
use App\Models\LokerSetelahMenikah;
use App\Models\LokerUser;
use App\Models\Pendidikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
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

    public function fotoUpdate(Request $request)
    {
        $biodata = LokerBiodata::where('email', $request->id)->first();

        if($request->hasFile('foto')) {
            if (file_exists("public/foto/" . $biodata->foto)) {
                File::delete("public/foto/" . $biodata->foto);
            }
            $file = $request->file('foto');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . "." . $extension;
            $file->move('public/foto/', $filename);
            $biodata->foto = $filename;
        }

        $biodata->save();

        return response()->json([
            'status' => $request->all()
        ]);
    }

    public function sebelumMenikah($id)
    {
        $sebelumMenikah = LokerSebelumMenikah::where('email', $id)->get();

        return response()->json([
            'sebelum_menikahs' => $sebelumMenikah
        ]);
    }

    public function sebelumMenikahStore(Request $request)
    {
        $sebelumMenikah = new LokerSebelumMenikah;
        $sebelumMenikah->email = $request->id;
        $sebelumMenikah->hubungan = $request->hubungan;
        $sebelumMenikah->nama = $request->nama;
        $sebelumMenikah->usia = $request->usia;
        $sebelumMenikah->gender = $request->gender;
        $sebelumMenikah->pendidikan = $request->pendidikan;
        $sebelumMenikah->pekerjaan = $request->pekerjaan;
        $sebelumMenikah->save();

        $sebelumMenikahs = LokerSebelumMenikah::where('email', $sebelumMenikah->email)->get();

        return response()->json([
            'status' => 'Data keluarga sebelum menikah berhasil diperbaharui',
            'sebelum_menikahs' => $sebelumMenikahs
        ]);
    }

    public function sebelumMenikahDelete($id)
    {
        $sebelumMenikah = LokerSebelumMenikah::find($id);
        $sebelumMenikah->delete();

        $sebelumMenikahs = LokerSebelumMenikah::where('email', $sebelumMenikah->email)->get();

        return response()->json([
            'status' => 'Data keluarga sebelum menikah berhasil dihapus',
            'sebelum_menikahs' => $sebelumMenikahs
        ]);
    }

    public function setelahMenikah($id)
    {
        $setelahMenikah = LokerSetelahMenikah::where('email', $id)->get();

        return response()->json([
            'setelah_menikahs' => $setelahMenikah
        ]);
    }

    public function setelahMenikahStore(Request $request)
    {
        $setelahMenikah = new LokerSetelahMenikah;
        $setelahMenikah->email = $request->id;
        $setelahMenikah->hubungan = $request->hubungan;
        $setelahMenikah->nama = $request->nama;
        $setelahMenikah->tempat_lahir = $request->tempat_lahir;
        $setelahMenikah->tanggal_lahir = $request->tanggal_lahir;
        $setelahMenikah->pekerjaan = $request->pekerjaan;
        $setelahMenikah->save();

        $setelahMenikahs = LokerSetelahMenikah::where('email', $setelahMenikah->email)->get();

        return response()->json([
            'status' => 'Data keluarga setelah menikah berhasil diperbaharui',
            'setelah_menikahs' => $setelahMenikahs
        ]);
    }

    public function setelahMenikahDelete($id)
    {
        $setelahMenikah = LokerSetelahMenikah::find($id);
        $setelahMenikah->delete();

        $setelahMenikahs = LokerSetelahMenikah::where('email', $setelahMenikah->email)->get();

        return response()->json([
            'status' => 'Data keluarga setelah menikah berhasil dihapus',
            'setelah_menikahs' => $setelahMenikahs
        ]);
    }

    public function kerabatDarurat($id)
    {
        $kerabatDarurat = LokerKerabatDarurat::where('email', $id)->get();

        return response()->json([
            'kerabat_darurats' => $kerabatDarurat
        ]);
    }

    public function kerabatDaruratStore(Request $request)
    {
        $kerabatDarurat = new LokerKerabatDarurat;
        $kerabatDarurat->email = $request->id;
        $kerabatDarurat->hubungan = $request->hubungan;
        $kerabatDarurat->nama = $request->nama;
        $kerabatDarurat->gender = $request->gender;
        $kerabatDarurat->telepon = $request->telepon;
        $kerabatDarurat->alamat = $request->alamat;
        $kerabatDarurat->save();

        $kerabatDarurats = LokerKerabatDarurat::where('email', $kerabatDarurat->email)->get();

        return response()->json([
            'status' => 'Data kerabat darurat berhasil diperbaharui',
            'kerabat_darurats' => $kerabatDarurats
        ]);
    }

    public function kerabatDaruratDelete($id)
    {
        $kerabatDarurat = LokerKerabatDarurat::find($id);
        $kerabatDarurat->delete();

        $kerabatDarurats = LokerKerabatDarurat::where('email', $kerabatDarurat->email)->get();

        return response()->json([
            'status' => 'Data kerabat darurat berhasil dihapus',
            'kerabat_darurats' => $kerabatDarurats
        ]);
    }

    public function medsos($id)
    {
        $medsos = LokerMedsos::where('email', $id)->get();

        return response()->json([
            'medsos' => $medsos
        ]);
    }

    public function medsosStore(Request $request)
    {
        $medsos = new LokerMedsos;
        $medsos->email = $request->id;
        $medsos->nama_medsos = $request->nama_medsos;
        $medsos->nama_akun = $request->nama_akun;
        $medsos->save();

        $medsoss = LokerMedsos::where('email', $medsos->email)->get();

        return response()->json([
            'status' => 'Data media sosial berhasil ditambahkan',
            'medsoss' => $medsoss
        ]);
    }

    public function medsosDelete($id)
    {
        $medsos = LokerMedsos::find($id);
        $medsos->delete();

        $medsoss = LokerMedsos::where('email', $medsos->email)->get();

        return response()->json([
            'status' => 'Data media sosial berhasil dihapus',
            'medsoss' => $medsoss
        ]);
    }

    public function pendidikan($id)
    {
        $pendidikan = LokerPendidikan::where('email', $id)->get();

        return response()->json([
            'pendidikans' => $pendidikan
        ]);
    }

    public function pendidikanStore(Request $request)
    {
        $pendidikan = new LokerPendidikan;
        $pendidikan->email = $request->id;
        $pendidikan->tingkat = $request->tingkat;
        $pendidikan->nama = $request->nama;
        $pendidikan->kota = $request->kota;
        $pendidikan->jurusan = $request->jurusan;
        $pendidikan->tahun_masuk = $request->tahun_masuk;
        $pendidikan->tahun_lulus = $request->tahun_lulus;
        $pendidikan->save();

        $pendidikans = LokerPendidikan::where('email', $pendidikan->email)->get();

        return response()->json([
            'status' => 'Data pendidikan berhasil diperbaharui',
            'pendidikans' => $pendidikans
        ]);
    }

    public function pendidikanDelete($id)
    {
        $pendidikan = LokerPendidikan::find($id);
        $pendidikan->delete();

        $pendidikans = LokerPendidikan::where('email', $pendidikan->email)->get();

        return response()->json([
            'status' => 'Data pendidikan berhasil dihapus',
            'pendidikans' => $pendidikans
        ]);
    }
}
