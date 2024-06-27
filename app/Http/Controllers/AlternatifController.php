<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alternatif;

class AlternatifController extends Controller
{
    public function index()
    {
        $alternatifs = Alternatif::all();
        return view('alternatif', compact('alternatifs'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|array',
            'teknik' => 'required|array',
            'fisik' => 'required|array',
            'intelejen' => 'required|array',
            'mental' => 'required|array',
            'usia' => 'required|array',
        ]);

        for ($i = 0; $i < count($data['nama']); $i++) {
            Alternatif::create([
                'nama' => $data['nama'][$i],
                'teknik' => $data['teknik'][$i],
                'fisik' => $data['fisik'][$i],
                'intelejen' => $data['intelejen'][$i],
                'mental' => $data['mental'][$i],
                'usia' => $data['usia'][$i],
            ]);
        }

        return redirect()->route('alternatif');
    }

    public function destroyAll()
    {
        Alternatif::truncate();
        return redirect()->route('alternatif');
    }
}
