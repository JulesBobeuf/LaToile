<?php

namespace App\View\Components;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class statutUtilisateur extends Component {

    public User $user;

    /**
     * @param User $user
     */
    public function __construct(User $user) {
        $this->user = $user;
    }

    public function nombreCommentaires(): int {
        $commentaires = DB::table('commentaires')->where('user_id', '=', Auth::user()->id)->get();
        $count = 0;
        foreach ($commentaires as $commentaire){
            $count += 1;
        }
        return $count;
    }

    public function nombreOeuvresLikes(): int {
        $likes = DB::table('likes')->where('user_id', '=', Auth::user()->id)->get();
        $count = 0;
        foreach ($likes as $like){
            $count += 1;
        }
        return $count;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render() {
        return view('components.statut-utilisateur');
    }

}
