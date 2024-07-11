<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Bobot;
use Illuminate\Http\Request;

class BobotController extends Controller
{
    public function index()
    {
        // Mengambil data bobot pertama, jika ada
        $bobot = Bobot::first() ?? new Bobot();

        return view('bobot', compact('bobot'));
    }

    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'teknik' => 'required|integer|min:1|max:5',
            'fisik' => 'required|integer|min:1|max:5',
            'intelejen' => 'required|integer|min:1|max:5',
            'mental' => 'required|integer|min:1|max:5',
            'usia' => 'required|integer|min:1|max:5',
        ]);

        // Update atau simpan data bobot
        $bobot = Bobot::first() ?? new Bobot();
        $bobot->teknik = $request->teknik;
        $bobot->fisik = $request->fisik;
        $bobot->intelejen = $request->intelejen;
        $bobot->mental = $request->mental;
        $bobot->usia = $request->usia;
        $bobot->save();

        return redirect()->route('bobot.index')->with('success', 'Bobot berhasil disimpan!');
    }
}
