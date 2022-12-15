<?php

namespace App\Http\Controllers;

use App\Models\Oeuvre;
use App\Models\Salle;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class SalleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cat = $request->input('cat', 'All');
        if ($cat != 'All')
            $salles = Salle::where('type', $cat)->get();
        else
            $salles = Salle::all();
        return view('salles.index', ['salles' => $salles, 'cat' => $cat]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('salles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'nom' => 'required',
                'theme' => 'required',
                'description' => 'required',
                'plan_url' => 'required',
                'entree' => 'required',
                'editable' => 'required',
            ]
        );

        $salle = new Salle;

        $salle->nom = $request->nom;
        $salle->theme = $request->theme;
        $salle->description = $request->description;
        $salle->plan_url = $request->plan_url;
        $salle->entree = $request->entree;
        $salle->editable = $request->editable;

        $nom = "Pas de nom dans salle controller";
        if ($request->hasFile('images') && $request->file('images')->isValid()) {
            $file = $request->file('images');
            $base = 'salles';
            $now = time();
            $nom = sprintf("%s_%d.%s", $base, $now, $file->extension());
            $file->storeAs('images', $nom);
            $salle->url_media = 'images/' . $nom;
        }
        $salle->save();

        return redirect()->route('salles.index')
            ->with('type', 'primary')
            ->with('msg', 'salles ajoutée avec succès' . $nom);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Oeuvre $oeuvres
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $categoriesOeuvres = array('Toutes les oeuvres','Oeuvres validées');
        $cat = $request->input('cat', 'Toutes les oeuvres');
        $action = $request->query('action', 'show');
        $salle = Salle::find($id);
        if ($cat=='Toutes les oeuvres') {
            $oeuvres = Oeuvre::all()->where('salle_id', '=', $salle->id);
        }
        else {
            $oeuvres = Oeuvre::all()->where('salle_id', '=', $salle->id)->where('valide','=',1);
        }
        return view('salles.show', ['salle' => $salle, 'action' => $action,'oeuvres' => $oeuvres,'cat' => $cat, 'categoriesOeuvres' => $categoriesOeuvres]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Oeuvre $oeuvres
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $salle = Salle::find($id);
        return view('salles.edit', ['salle' => $salle]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Oeuvre $oeuvres
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $salle = Salle::find($id);
        $this->validate(
            $request,
            [
                'nom' => 'required',
                'theme' => 'required',
                'description' => 'required',
                'plan_url' => 'required',
                'entree' => 'required',
                'editable' => 'required',
            ]
        );

        $salle->nom = $request->nom;
        $salle->theme = $request->theme;
        $salle->description = $request->description;
        $salle->plan_url = $request->plan_url;
        $salle->entree = $request->entree;
        $salle->editable = $request->editable;
        $salle->save();
        return redirect()->route('salles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Oeuvre $oeuvres
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $salle = Salle::find($id);
        $salle->delete();
        return redirect()->route('salles.index');
    }

}
