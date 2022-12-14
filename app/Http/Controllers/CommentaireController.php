<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Oeuvre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $categories = array('All','Recent');
        $cat = $request->input('cat', 'All');
        if ($cat != 'All')
            $commentaires = Commentaire::where('type', $cat)->get();
        else
            $commentaires = Commentaire::all();

        if ($cat== "Recent") {
            $commentaires = Commentaire::all()->sortBy('created_at')->take(5);
        }

        return view('commentaires.index', ['commentaires' => $commentaires, 'cat' => $cat, 'categories' => $categories]);
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
                'oeuvreId' =>'required',
                'titreCommentaire' => 'required',
                'texteCommentaire' => 'required',
                'note' => 'required',
            ]
        );

        $commentaire = new Commentaire();

        $commentaire->titreCommentaire = $request->titreCommentaire;
        $commentaire->texteCommentaire = $request->texteCommentaire;
        $commentaire->note = $request->note;
        $commentaire->dateCommentaire = date("Y-m-d h:i:s");
        $commentaire->idOeuvre = $request->oeuvreId;

        $user = Auth::user();

        $commentaire->idVisiteur = $user->visiteur->id;

        $nom = "Pas de nom controller Commentaire";
        $commentaire->save();

        return redirect()->route('commentaires.index')
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
                'titreCommentaire' => 'required',
                'texteCommentaire' => 'required',
                'note' => 'required',
            ]
        );

        $commentaire->titreCommentaire = $request->titreCommentaire;
        $commentaire->texteCommentaire = $request->texteCommentaire;
        $commentaire->note = $request->note;
        $commentaire->dateCommentaire = date("Y-m-d h:i:s");

        $commentaire->save();

        return redirect()->route('commentaires.index');
    }
}
