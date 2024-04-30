<?php

namespace App\Http\Controllers;

use App\Models\Casal;
use App\Models\Ciutat;
use Illuminate\Http\Request;

class CasalController extends Controller
{
    public function home() {
        $casals = Casal::all();
        return view('home', compact('casals'));
    }

    public function new()
    {
        $ciutats = Ciutat::all();
        return view('new', compact('ciutats'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'data_inici' => 'required|date',
            'data_final' => 'required|date',
            'n_places' => 'required|numeric',
            'id_ciutat' => 'required|numeric',
        ]);

        try {
            if($validatedData['data_inici'] >= $validatedData['data_final']) {
                return redirect()->back()->with('error');
            } else {
                $casal = Casal::create($validatedData);
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->route('user.home')->with('success', 'Inscription successfully created!');
    }

    public function edit(Casal $casal)
    {
        $ciutats = Ciutat::all();
        return view('edit', compact('casal', 'ciutats'));
    }

    public function update(Request $request, String $id)
    {
        $casal = Casal::findOrFail($id);
        $request->validate([
            'nom' => 'required|string|max:255',
            'data_inici' => 'required|date',
            'data_final' => 'required|date',
            'n_places' => 'required|numeric',
            'id_ciutat' => 'required|numeric',
        ]);

        try {
            $casal->nom = $request->nom;
            $casal->data_inici = $request->data_inici;
            $casal->data_final = $request->data_final;
            $casal->n_places = $request->n_places;
            $casal->id_ciutat = $request->id_ciutat;

            if($casal->data_inici >= $casal->data_final) {
                return redirect()->back()->with('error');
            } else {
                $casal->update();
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->route('user.home');
    }

    public function delete(Casal $casal) {
        $casal->delete();

        return redirect()->route('user.home');
    }
}
