<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Oeuvre;
use App\Models\User;
use App\Models\Visiteur;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $user = User::all();
        return redirect()->route('salles.index', ['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('users.create');
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
                'name',
                'email',
                'email_verified_at',
                'password',
                'avatar',
                'admin',
                'remember_token',
                'created_at',
                'updated_at',
                'two_factor_secret',
                'two_factor_recovery_codes'
            ]
        );

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->email_verified_at = $request->email_verified_at;
        $user->password = $request->password;
        $user->avatar = $request->avatar;
        $user->admin = $request->admin;
        $user->remember_token = $request->remember_token;
        $user->created_at = $request->created_at;
        $user->updated_at = $request->updated_at;
        $user->two_factor_secret = $request->two_factor_secret;
        $user->two_factor_recovery_codes = $request->two_factor_recovery_codes;

        $nom = "Pas de nom controller visiteur";
        if ($request->hasFile('images') && $request->file('images')->isValid()) {
            $file = $request->file('images');
            $base = 'user';
            $now = time();
            $nom = sprintf("%s_%d.%s", $base, $now, $file->extension());
            $file->storeAs('images', $nom);
            $user->url_media = 'images/' . $nom;
        }
        $user->save();


        return redirect()->route('users.index')
            ->with('type', 'primary')
            ->with('msg', 'Utilisateur ajouté avec succès' . $nom);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id) {
        $action = $request->query('action', 'show');
        $user = User::find($id);
        $user_name = User::All()->where('id','=',$user->id);
        return view('users.show', ['user' => $user,'user_name' => $user_name , 'action' => $action] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $user = User::find($id);
        if ($user->cant('update', $user)) {
            return redirect()->route('users.show', ['user' => $user->id, 'action' => 'show'])
                ->with('msg', "Vous n'êtes pas l'utilisateur !");
        }
        return view('users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $visiteur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $user = User::find($id);
        $this->validate(
            $request,
            [
                'name',
                'email',
                'email_verified_at',
                'password',
                'avatar',
                'admin',
                'remember_token',
                'created_at',
                'updated_at',
                'two_factor_secret',
                'two_factor_recovery_codes'
            ]
        );

        $user->name = $request->name;
        $user->email = $request->email;
        $user->email_verified_at = $request->email_verified_at;
        $user->password = $request->password;
        $user->avatar = $request->avatar;
        $user->admin = $request->admin;
        $user->remember_token = $request->remember_token;
        $user->created_at = $request->created_at;
        $user->updated_at = $request->updated_at;
        $user->two_factor_secret = $request->two_factor_secret;
        $user->two_factor_recovery_codes = $request->two_factor_recovery_codes;

        $user->save();

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Visiteur $visiteur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id) {
        $user = User::find($id);

        $user->delete();
        return redirect()->route('users.index');
    }
}
