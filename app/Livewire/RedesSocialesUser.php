<?php

namespace App\Livewire;

use App\Models\SocialNetwork;
use App\Models\SocialnetworksXUser;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RedesSocialesUser extends Component
{
    public $socialNetUser;
    public $tipoRedSocial;
    public $redSocialTipo;
    public $nameRedSocialUser;
    public $modal = false;
    public $errorValidate = false;
    public $buscarTipoRed = [];

    public function render()
    {
        if ($this->buscarTipoRed) {
            $this->socialNetworksAll();
            return $this->findTypeSocialNetwork();
        } else {
            $this->socialNetworksAll();
            $this->findSocialNetworksUser();
            return view('livewire.redes-sociales-user', [
                'socialNetUser' => $this->socialNetUser,
            ]);
        }
    }
    // TRAER TODAS LAS REDES SOCIALES DEL USUARIO AUTENTICADO
    public function findSocialNetworksUser()
    {
        $this->socialNetUser = SocialnetworksXUser::select('*')
            ->join('social_networks', 'social_networks.id_socialNetwork', '=', 'fk_socialNetwork')
            ->where('fk_user', Auth::id())
            ->orderBy('id_socialNetwUser','desc')
            ->get();
    }
    // BUSCAR POR TIPO DE RED SOCIAL
    public function findTypeSocialNetwork()
    {
        $this->socialNetUser = SocialnetworksXUser::select('*')
            ->join('social_networks', 'social_networks.id_socialNetwork', '=', 'fk_socialNetwork')
            ->where('id_socialNetwork', $this->buscarTipoRed)
            ->where('fk_user', Auth::id())
            ->get();

        // Retornar la vista con los resultados filtrados
        return view('livewire.redes-sociales-user', [
            'socialNetUser' => $this->socialNetUser,
        ]);
    }
    // AGEGAR NUEVA RED SOCIAL
    public function addSocialNetwork()
    {
        $this->errorValidate = false;
        $this->validate(
            [
                'redSocialTipo' => 'required|in:1,2,3,4',
                'nameRedSocialUser' => 'required|string|min:3',
            ]
        );

        SocialnetworksXUser::insert([
            [
                'fk_socialNetwork' => $this->redSocialTipo,
                'fk_user' => Auth::id(),
                'socialNetwUser_name' => $this->nameRedSocialUser,
            ],
        ]);

        $this->buscarTipoRed = [];
        $this->render();
        $this->closeModal();
        session()->flash('success', 'Red social registrada con éxito');
    }
    // TRAER EL NOMBRE Y ID DE LAS REDES SOCIALES
    public function socialNetworksAll()
    {
        $this->tipoRedSocial = SocialNetwork::all();
    }
    // ABRIR Y CERRAR MODAL
    public function openModal()
    {
        $this->modal = true;
    }
    // CERRAR MODAL
    public function closeModal()
    {
        $this->errorValidate = true;
        $this->modal = false;
    }
}
