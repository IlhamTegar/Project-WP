<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alternatif;
use App\Models\Bobot;

class HasilController extends Controller
{
    public function index()
    {
        $alternatifs = Alternatif::all();
        $bobot = Bobot::first();

        if (!$bobot) {
            return redirect()->route('bobot')->with('error', 'Silakan masukkan bobot terlebih dahulu.');
        }

        // Perhitungan SPK WP
        $vektors = [];
        $total_vektor = 0;

        foreach ($alternatifs as $alternatif) {
            $vektor = pow($alternatif->teknik, $bobot->teknik) *
                      pow($alternatif->fisik, $bobot->fisik) *
                      pow($alternatif->intelejen, $bobot->intelejen) *
                      pow($alternatif->mental, $bobot->mental) *
                      pow($bobot->usia, $alternatif->usia); // Usia sebagai cost (min)
            $vektors[$alternatif->id] = $vektor;
            $total_vektor += $vektor;
        }

        $rankings = [];
        foreach ($vektors as $id => $vektor) {
            $rankings[$id] = $vektor / $total_vektor;
        }

        // Mengurutkan hasil perhitungan
        arsort($rankings);

        // Menyiapkan data untuk tampilan
        $results = [];
        foreach ($rankings as $id => $score) {
            $results[] = [
                'alternatif' => Alternatif::find($id),
                'score' => $score,
            ];
        }

        return view('hasil', compact('results'));
    }
}
