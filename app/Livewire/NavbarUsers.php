<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NavbarUsers extends Component
{
    public $usuarioAuth;
    
    // METODO PARA DAR ACCESO AL DASHBOARD
    public function dashboard()
    {
        $this->usuarioAuth = User::select('user_id', 'person_description', 'person_img','email','person_birthDate')
        ->selectRaw("CONCAT(person_name,' ',person_lastname) AS Nombre_Apellido")
        ->join('persons','persons.id_person','=','users.fk_person')
        ->where("user_id", Auth::id())
        ->first();
    }

    public function render()
    {
        $this->dashboard();
        return view('livewire.navbar-users');
    }
}
