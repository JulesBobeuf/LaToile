<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Oeuvre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class OeuvreController extends Controller
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
            $oeuvres = Oeuvre::where('type', $cat)->get();
        else
            $oeuvres = Oeuvre::all();

        if ($cat== "Recent") {
            $oeuvres = Oeuvre::all()->sortBy('dateInscription')->take(5);
        }

        return view('oeuvres.index', ['oeuvres' => $oeuvres]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('oeuvres.create');
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
                'nom' => 'required',
                'description' => 'required',
                'coord_x' => 'required',
                'coord_y' => 'required',
                'auteur' => 'required',
                'date_creation' => 'required',
                'style' => 'required',
                'valide' => 'required',
            ]
        );

        $oeuvre = new Oeuvre;

        $oeuvre->nom = $request->nom;
        $oeuvre->description = $request->description;
        $oeuvre->coord_x = $request->coord_x;
        $oeuvre->coord_y = $request->coord_y;
        $oeuvre->salle_id = 4;
        $oeuvre->auteur = $request->auteur;
        $oeuvre->date_creation = $request->date_creation;
        $oeuvre->style = $request->style;
        $oeuvre->valide = $request->valide;

        if ($request->hasFile('media') && $request->file('media')->isValid()) {
            $file = $request->file('media');
            $base = 'oeuvre';
            $now = time();
            $nom = sprintf("%s_%d.%s", $base, $now, $file->extension());
            $file->storeAs('images/oeuvres/', $nom);
            $oeuvre->media_url = 'images/oeuvres/' . $nom;
        }
        if ($request->hasFile('thumbnail') && $request->file('thumbnail')->isValid()) {
            $file = $request->file('thumbnail');
            $base = 'thumbnail';
            $now = time();
            $nom = sprintf("%s_%d.%s", $base, $now, $file->extension());
            $file->storeAs('images/thumbnails/', $nom);
            $oeuvre->thumbnail_url = 'images/thumbnails/' . $nom;
        }
        $oeuvre->save();

        return redirect()->route('oeuvres.index')
            ->with('type', 'primary')
            ->with('msg', 'oeuvres ajoutée avec succès' . $oeuvre->nom);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Oeuvre $oeuvres
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id) {
        $user = Auth::user();
        $oeuvre = Oeuvre::find($id);
        $nbLikes = DB::table('likes')->where('oeuvre_id','=',$oeuvre->id)->count();
        $categories = array('All','Recent','Ancien');
        $cat = $request->input('cat', 'All');
        $like = DB::table('likes')->where('oeuvre_id','=',$oeuvre->id)->where('user_id','=',$user->id)->exists();
        if ($cat=='Ancien') {
            $commentaires = Commentaire::All()->where('oeuvre_id','=',$oeuvre->id)->sortByDesc('created_at');
        }
        elseif ($cat=='Recent') {
            $commentaires = Commentaire::All()->where('oeuvre_id','=',$oeuvre->id)->sortBy('created_at',);
        }
        else {
            $commentaires = Commentaire::All()->where('oeuvre_id','=',$oeuvre->id)->sortBy('created_at');
        }
        return view('oeuvres.show', ['oeuvre' => $oeuvre, 'commentaires' => $commentaires, 'nbLikes' => $nbLikes, 'categories' => $categories, 'cat' => $cat, "like" => $like]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Oeuvre $oeuvres
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $oeuvre = Oeuvre::find($id);
        $this->validate(
            $request,
            [
                'nomOeuvre' => 'required',
                'descriptionOeuvre' => 'required',
                'dateInscription' => 'required',
                'lienOeuvre' => 'required',
            ]
        );
        $oeuvre->nomOeuvre = $request->nomOeuvre;
        $oeuvre->descriptionOeuvre = $request->descriptionOeuvre;
        $oeuvre->dateInscription = $request->dateInscription;
        $oeuvre->lienOeuvre = $request->lienOeuvre;
        $oeuvre->save();
        return redirect()->route('oeuvres.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Oeuvre $oeuvres
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id) {
        $oeuvre = Oeuvre::find($id);
        if (Gate::denies('delete-oeuvres', $oeuvre)) {
            return redirect()->route('oeuvres.show',
                ['titre' => 'Affichage d\'une oeuvres', 'oeuvr' => $oeuvre->id, 'action' => 'show'])
                ->with('type', 'error')
                ->with('msg', 'Impossible de supprimer l\'oeuvres');
        }

        $oeuvre->delete();
        return redirect()->route('oeuvres.index');
    }


    public function upload(Request $request, $id) {
        $oeuvre = Oeuvre::findOrFail($id);
        if ($request->hasFile('images') && $request->file('images')->isValid()) {
            $file = $request->file('images');
        } else {
            if (!$request->hasFile('images'))
                $msg = "Aucun fichier téléchargé";
            else
                $msg = "fichier mal téléchargé";
            return redirect()->route('oeuvres.show', [$oeuvre->id])
                ->with('type', 'error')
                ->with('msg', 'oeuvres non modifiée (' . $msg . ')');
        }
        $nom = 'images';
        $now = time();
        $nom = sprintf("%s_%d.%s", $nom, $now, $file->extension());

        $file->storeAs('images', $nom);
        if (isset($oeuvre->url_media) && $oeuvre->url_media != "images/no-images.svg") {
            Log::info("Image supprimée : " . $oeuvre->url_media);
            Storage::delete($oeuvre->url_media);
        }
        $oeuvre->url_media = 'images/' . $nom;
        $oeuvre->save();
        return redirect()->route('oeuvres.show', [$oeuvre->id])
            ->with('type', 'primary')
            ->with('msg', 'oeuvres modifiée avec succès');
    }

}

