<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bobot;

class BobotController extends Controller
{
    public function index()
    {
        $bobot = Bobot::first();
        return view('bobot', compact('bobot'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'teknik' => 'required|integer|between:1,5',
            'fisik' => 'required|integer|between:1,5',
            'intelejen' => 'required|integer|between:1,5',
            'mental' => 'required|integer|between:1,5',
            'usia' => 'required|integer|between:17,25',
        ]);

        // Normalisasi untuk kriteria cost (min)
        $data['usia'] = 1 / $data['usia'];

        $bobot = Bobot::first();

        if ($bobot) {
            $bobot->update($data);
        } else {
            Bobot::create($data);
        }

        return redirect()->route('bobot');
    }
}
