<?php

namespace App\Policies;

use App\Models\Commentaire;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class CommentairePolicy {
    use HandlesAuthorization;

    function update(User $user, Commentaire $commentaire) {
        return Auth::user()->id === $commentaire->user_id;
    }

    function delete(User $user, Commentaire $commentaire) {
        return $user->admin || Auth::user()->id === $commentaire->user_id;
    }

    function create(User $user) {
        return true;
    }
}
