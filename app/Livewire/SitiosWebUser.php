<?php

namespace App\Livewire;

use App\Models\Website;
use Illuminate\Support\Facades\Auth;
use Spatie\Browsershot\Browsershot;
use Livewire\Component;

class SitiosWebUser extends Component
{
    public $webSiteUser;
    public $newUrl;

    public function render()
    {
        $this->findWebSite();
        return view('livewire.sitios-web-user');
    }

    public function findWebSite()
    {
        $this->webSiteUser = Website::where('fk_user', Auth::id())
        ->orderBy('id_website','desc')
        ->get();
    }

    public function newCapture()
    {
        $this->validate(
            [
                'newUrl' => 'required|regex:/^https?:\/\/[\w\-]+(\.[\w\-]+)+[\/#?]?.*$/',
            ]
        );

        $url = $this->newUrl;
        $fecha = date('Y-m-d');
        $screenshotPath = 'img/urlCaptures/' . $fecha . uniqid() . '.png';

        // VERIFICAR SI LA URL RESPONDE A UN ESTADO VALIDO COMO UN 200 POR EJEMPLO
        $headers = @get_headers($url); // Usamos @ para evitar advertencias si la URL no es válida
        if (!filter_var($url, FILTER_VALIDATE_URL) || !$headers || strpos($headers[0], '200') === false) {
            session()->flash('danger', 'La página no existe o no es accesible');
        } else {
            $titleUrl = Browsershot::url($url)
                ->evaluate('document.title');

            Browsershot::url($url)
                ->windowSize(1280, 800)
                ->save($screenshotPath);

            Website::insert([
                [
                    'fk_user' => Auth::id(),
                    'website_tittle' => $titleUrl,
                    'website_url' => $this->newUrl,
                    'website_img' => $screenshotPath,
                ],
            ]);

            $this->clearForm();
            $this->findWebSite();
            session()->flash('success', 'Sitio web registrado con éxito');
        }
    }

    public function clearForm()
    {
        $this->newUrl = "";
    }
}
