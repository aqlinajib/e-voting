<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\event;

class SuperadmController extends Controller
{
    public function update(Request $request, $id_event)
    {
        
        $request->validate([
                'nama_event' => 'required',
                'deskripsi' => 'required',
                'active' => 'required|boolean',
                'kuota_vote' => 'required|integer',
                'sembunyikan_foto' => 'required|boolean',
            ]);

            $event = [
                'nama_event' =>$request->nama_event,
                'deskripsi' =>$request->deskripsi,
                'active' =>$request->active,
                'kuota_vote' =>$request->kuota_vote,
                'sembunyikan_foto' =>$request->sembunyikan_foto,
            ];
            
            event::where('id_event',$id_event)->update($event);
            return redirect()->to('index/superadm')->with('success','Berhasil Melakukan Update Data');
            
    }
}
