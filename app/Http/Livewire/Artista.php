<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spotify;

class Artista extends Component
{

    public $imagem;
    public $nome;
    public $genero;
    public $seguidores;
    public $identificador;

    public function mount($id)
    {
        $this->identificador = $id;

        $resultado = Spotify::artist($id)->get(); 
        $this->imagem = $resultado['images'][0]['url'];
        $this->nome = $resultado['name'];
        $this->genero = $resultado['genres'][0];
        $this->seguidores = $resultado['followers']['total'];

    }

    public function render()
    {
        return view('livewire.artista');
    }
}
