<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\event;
use App\Models\kandidat;

class KandidatController extends Controller
{
    public function kandidat()
    {
        $data = kandidat::all();
        return view('kandidat.index', compact('data'));
    }
    public function create()
    {
        return view('kandidat.tambahkandidat');
    }

    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'nama_kandidat' => 'required',
            'foto' => 'required',  
        ]);

        // Simpan data ke database
        kandidat::create($request->all());
        return redirect('kandidat.index')->with('success', 'Data event berhasil disimpan.');
    }

}
