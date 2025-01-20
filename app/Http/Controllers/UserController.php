<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kandidat;
use App\Models\Event;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $idEvent = $request->query('id_event');

        // Pengecekan apakah id_event sudah di-set
        if (!$idEvent) {
            // Handle the case when id_event is not set, you might want to redirect or show an error message
            return redirect()->back()->withErrors(['id_event' => 'ID Event tidak valid']);
        }

        // Pengecekan apakah event dengan idEvent tersebut ada
        $event = Event::find($idEvent);

        // Pengecekan apakah event ditemukan
        if (!$event) {
            // Handle the case when the event is not found, you might want to redirect or show an error message
            return redirect()->back()->withErrors(['id_event' => 'Event tidak ditemukan']);
        }

        $data = Kandidat::all();

        return view('user.index', [
            'data' => $data,
            'idEvent' => $idEvent,
            'kuotaVote' => $event->kuota_vote,
            'sembunyikanFoto' => $event->sembunyikan_foto, // Pass the sembunyikan_foto to the view
        ]);
    }

    public function submitVote(Request $request)
    {
        $selectedCandidates = $request->input('selected_candidates');
        $idEvent = $request->input('id_event');

        // Periksa apakah event dengan ID yang diberikan ditemukan
        $event = Event::find($idEvent);

        // Pengecekan apakah event ditemukan
        if (!$event) {
            return redirect()->back()->withErrors(['id_event' => 'Event tidak ditemukan']);
        }

        // Periksa apakah jumlah pemilihan tidak melebihi kuota_vote
        $selectedCandidates = $selectedCandidates ?? [];

        if (count($selectedCandidates) > $event->kuota_vote) {
            return redirect()->back()->withErrors(['vote_limit' => 'Jumlah pemilihan melebihi kuota_vote yang diizinkan']);
        }

        try {
            foreach ($selectedCandidates as $candidateId) {
                $kandidat = Kandidat::findOrFail($candidateId);
                $kandidat->increment('jumlah_suara');
            }

            // Generate PDF
            $candidates = Kandidat::whereIn('id', $selectedCandidates)->get();
            $pdf = Pdf::loadView('pdf.candidates', compact('candidates'));

            // Store PDF temporarily
            $pdfPath = 'pdfs/selected_candidates_' . time() . '.pdf';
            Storage::put($pdfPath, $pdf->output());

            // Redirect to thank you page with download link
            return redirect()->route('user.thank')->with('pdfPath', $pdfPath);
        } catch (\Exception $e) {
            // Jika terjadi kesalahan, redirect kembali dengan pesan kesalahan
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat memproses pemilihan']);
        }
    }



    public function thank()
    {
        return view('user.thank');
    }
}
