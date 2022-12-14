<?php

namespace App\Http\Controllers;

    use App\Models\Oeuvre;
    use App\Models\Salle;
    use Illuminate\Auth\Access\Gate;
    use Illuminate\Http\Request;
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
    public function index(Request $request)
    {
        $cat = $request->input('cat', 'All');
        if ($cat != 'All')
            $oeuvres = Oeuvre::where('type', $cat)->get();
        else
            $oeuvres = Oeuvre::all();
        return view('oeuvres.index', ['oeuvres' => $oeuvres, 'cat' => $cat]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('oeuvres.create');
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
                'media_url' => 'required',
                'thumbnail_url' => 'required',
                'informations' => 'required',
                'coord_x' => 'required',
                'coord_y' => 'required',
                'auteur' => 'required',
            ]
        );

        $oeuvre = new Oeuvre;

        $oeuvre->nom = $request->nom;
        $oeuvre->media_url = $request->descriptionOeuvre;
        $oeuvre->thumbnail_url = $request->thumbnail_url;
        $oeuvre->description = $request->informations;
        $oeuvre->coord_x = $request->coord_x;
        $oeuvre->coord_y = $request->coord_y;
        $oeuvre->auteur_id = $request->auteur;
        $oeuvre->date_creation = date("Y-m-d h:i:s");
        $oeuvre->style = $request->style;
        $oeuvre->valide = $request->valide;

        $salle = new Salle();

        $oeuvre->salle_id = $salle->salle->id;

        $nom = "Pas de nom dans oeuvres controller";
        if ($request->hasFile('images') && $request->file('images')->isValid()) {
            $file = $request->file('images');
            $base = 'oeuvres';
            $now = time();
            $nom = sprintf("%s_%d.%s", $base, $now, $file->extension());
            $file->storeAs('images', $nom);
            $oeuvre->url_media = 'images/' . $nom;
        }
        $oeuvre->save();

        return redirect()->route('oeuvres.index')
            ->with('type', 'primary')
            ->with('msg', 'oeuvres ajoutée avec succès' . $nom);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Oeuvre $oeuvres
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $action = $request->query('action', 'show');
        $oeuvre = Oeuvre::find($id);

        return view('oeuvres.show', ['oeuvre' => $oeuvre, 'action' => $action]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Oeuvre $oeuvres
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $oeuvre = Oeuvre::find($id);
        return view('oeuvres.edit', ['oeuvres' => $oeuvre]);
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
        $oeuvre = Oeuvre::find($id);
        $this->validate(
            $request,
            [
                'nom' => 'required',
                'media_url' => 'required',
                'thumbnail_url' => 'required',
                'informations' => 'required',
                'coord_x' => 'required',
                'coord_y' => 'required',
                'auteur' => 'required',
            ]
        );

        $oeuvre->nom = $request->nom;
        $oeuvre->media_url = $request->descriptionOeuvre;
        $oeuvre->thumbnail_url = $request->thumbnail_url;
        $oeuvre->description = $request->informations;
        $oeuvre->coord_x = $request->coord_x;
        $oeuvre->coord_y = $request->coord_y;
        $oeuvre->auteur_id = $request->auteur;
        $oeuvre->date_creation = date("Y-m-d h:i:s");
        $oeuvre->style = $request->style;
        $oeuvre->valide = $request->valide;
        $oeuvre->save();
        return redirect()->route('oeuvres.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Oeuvre $oeuvres
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $oeuvre = Oeuvre::find($id);
        $oeuvre->delete();
        return redirect()->route('oeuvres.index');
    }


    public function upload(Request $request, $id)
    {
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
