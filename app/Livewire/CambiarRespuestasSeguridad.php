<?php

namespace App\Livewire;

use App\Models\Question;
use App\Models\SecretQuestion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class CambiarRespuestasSeguridad extends Component
{
    public $respuestaN1;
    public $respuestaN2;
    public $respuestaN3;
    public $questions;

    public function render()
    {
        $this->questions = Question::all();
        return view('livewire.cambiar-respuestas-seguridad');
    }

    private function clearForm()
    {
        $this->respuestaN1 = "";
        $this->respuestaN2 = "";
        $this->respuestaN3 = "";
    }

    public function updateRespuestas()
    {
        $this->validate(
            [
                'respuestaN1' => 'required|string|min:3',
                'respuestaN2' => 'required|string|min:3',
                'respuestaN3' => 'required|string|min:3',
            ]
        );

        $newAnswers = [
            0 => $this->respuestaN1,
            1 => $this->respuestaN2,
            2 => $this->respuestaN3,
        ];

        $answersUser = SecretQuestion::where('fk_user', Auth::id())->get();

        foreach ($answersUser as $index => $answerUser) {
            $answerUser->answer = Hash::make($newAnswers[$index]);
            $answerUser->save();
        }

        $this->clearForm();
        session()->flash('success', 'Respuestas actualizadas con éxito');
    }
}
