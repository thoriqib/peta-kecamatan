<?php

namespace App\Http\Controllers;

use App\Catatan;
use App\Gambar;
use App\Kecamatan;
use App\Village;
use Illuminate\Http\Request;

class PetaController extends Controller
{
    public function show(Request $request, $kecamatan)
    {
        $data = Kecamatan::where('slug', $kecamatan)->first();
        $data_kec = Kecamatan::orderBy('nama')->get();

        $data_kel = Village::where('district_id', strval($data->id))->get();

        $gambar = Gambar::where('kecamatan_id', $data->id)->get();

        $catatan = Catatan::where('kecamatan_id', $data->id)->get();
        return view("peta.$kecamatan", compact('data', 'data_kec', 'catatan', 'gambar', 'data_kel'));
    }

    public function storeCatatan(Request $request)
    {
        $data = $request->validate([
            'kecamatan_id' => 'required',
            'isi' => 'required|max:255',
        ]);
        $catatan = new Catatan();

        $kecamatan = Kecamatan::where('id', $data['kecamatan_id'])->first();

        $catatan->kecamatan_id = $data['kecamatan_id'];
        $catatan->isi = $data['isi'];

        $catatan->save();
        return redirect()->to("peta/$kecamatan->slug")->with('success','Sukses menambah catatan');
    }
}
