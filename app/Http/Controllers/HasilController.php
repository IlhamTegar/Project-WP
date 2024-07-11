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
            return redirect()->route('bobot.index')->with('error', 'Silakan masukkan bobot terlebih dahulu.');
        }

        // Total bobot untuk standarisasi
        $total_bobot = $bobot->teknik + $bobot->fisik + $bobot->intelejen + $bobot->mental + $bobot->usia;

        // Perhitungan SPK WP
        $vektors = [];
        $total_vektor = 0;

        foreach ($alternatifs as $alternatif) {
            $vektor = pow($alternatif->teknik, $bobot->teknik / $total_bobot) *
                      pow($alternatif->fisik, $bobot->fisik / $total_bobot) *
                      pow($alternatif->intelejen, $bobot->intelejen / $total_bobot) *
                      pow($alternatif->mental, $bobot->mental / $total_bobot) *
                      pow($alternatif->usia, -($bobot->usia / $total_bobot)); // Usia sebagai cost (min)
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
