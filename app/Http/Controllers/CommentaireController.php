<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Oeuvre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentaireController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $commentaires = Commentaire::all();
        return view('commentaires.index', ['commentaires' => $commentaires]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(int $oeuvreId) {
        $oeuvre = Oeuvre::find($oeuvreId);
        return view('commentaires.create', ['oeuvre' => $oeuvre]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validate(
            $request,
            [
                'titre' => 'required',
                'contenu' => 'required',
                'oeuvre_id' =>'required',
            ]
        );

        $commentaire = new Commentaire();

        $commentaire->titre = $request->titre;
        $commentaire->contenu = $request->contenu;
        $commentaire->user_id = Auth::user()->id;
        $commentaire->oeuvre_id = $request->oeuvre_id;
        $commentaire->valide = 0;
        $commentaire->save();

        $nom = "Commentaire créé.";
        return redirect()->route('oeuvres.show', $request->oeuvre_id)
            ->with('type', 'primary')
            ->with('msg', 'Commentaire ajouté avec succès' . $nom);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Commentaire $commentaire
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id) {
        $action = $request->query('action', 'show');
        $commentaire = Commentaire::find($id);

        return view('commentaires.show', ['commentaire' => $commentaire, 'action' => $action]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Commentaire $commentaire
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $commentaire = Commentaire::find($id);
        return view('commentaires.edit', ['commentaire' => $commentaire]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Commentaire $commentaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $commentaire = Commentaire::find($id);
        $this->validate(
            $request,
            [
                'titre' => 'required',
                'contenu' => 'required',
            ]
        );

        $commentaire->titre = $request->titre;
        $commentaire->contenu = $request->contenu;
        $commentaire->valide = 0;

        $commentaire->save();

        return redirect()->route('commentaires.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Commentaire $commentaire
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $commentaire = Commentaire::find($id);
        $commentaire->delete();
        return redirect()->route('commentaires.index');
    }
}
