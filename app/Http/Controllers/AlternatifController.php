<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alternatif;
use Illuminate\Support\Facades\Auth;

class AlternatifController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $alternatifs = Alternatif::all();
        return view('alternatif', compact('alternatifs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'teknik' => 'required|integer|min:1|max:10',
            'fisik' => 'required|integer|min:1|max:10',
            'intelejen' => 'required|integer|min:1|max:10',
            'mental' => 'required|integer|min:1|max:10',
            'usia' => 'required|integer|min:17|max:25',
        ]);

        Alternatif::create($request->all());

        return redirect()->route('alternatif');
    }

    public function destroy($id)
    {
        $alternatif = Alternatif::findOrFail($id);
        $alternatif->delete();

        return redirect()->route('alternatif');
    }

    public function destroyAll()
    {
        Alternatif::truncate();

        return redirect()->route('alternatif');
    }
}
