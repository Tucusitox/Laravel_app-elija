<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class CambiarContrasenaPerfil extends Component
{
    public $newPassword;
    public $confirmPassword;

    public function render()
    {
        return view('livewire.cambiar-contrasena-perfil');
    }

    public function updatePassword()
    {
        $this->validate(
            [
                'newPassword' => 'required|string|min:8',
                'confirmPassword' => 'required|string|min:8',
            ]
        );

        if ($this->newPassword === $this->confirmPassword) {

            User::where('user_id', Auth::id())
            ->update(
                ['password' => Hash::make($this->newPassword)],
            );

            $this->clearForm();
            session()->flash('success', 'Contraseña actualizada con éxito');
        }
        else{
            $this->clearForm();
            session()->flash('danger', 'Las contraseñas con coinciden');
        }
    }

    private function clearForm()
    {
        $this->newPassword = "";
        $this->confirmPassword = "";
    }
}
