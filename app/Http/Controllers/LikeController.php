<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LikeController extends Controller
{
    public function store($oeuvre_id)
    {
        $user_id = Auth::id();
        $like = new Like();
        $like->oeuvre_id = $oeuvre_id;
        $like->user_id = $user_id;
        $like->save();
        return redirect()->route('oeuvres.show', ['oeuvre' => $oeuvre_id]);
    }

    public function destroy($oeuvre_id)
    {
        $user_id = Auth::id();
        Like::where('user_id','=',$user_id)->where('oeuvre_id','=',$oeuvre_id)->delete();
        return redirect()->route('oeuvres.show', ['oeuvre' => $oeuvre_id]);
    }
}
