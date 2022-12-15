<?php

namespace App\View\Components;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class StatutUtilisateur extends Component {

    public User $user;

    /**
     * @param User $user
     */
    public function __construct(User $user) {
        $this->user = $user;
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
