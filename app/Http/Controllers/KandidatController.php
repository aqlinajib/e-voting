<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Kandidat;

class KandidatController extends Controller
{
    public function kandidat()
    {
        $data = Kandidat::all();
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
        Kandidat::create($request->all());
        return redirect('kandidat.index')->with('success', 'Data event berhasil disimpan.');
    }
       public function getKandidatData($id_event)
    {
        $data = Kandidat::where('id_event', $id_event)
            ->select('nama_kandidat', 'posisi', 'jumlah_suara')
            ->get();

        return response()->json($data);
    }

}
