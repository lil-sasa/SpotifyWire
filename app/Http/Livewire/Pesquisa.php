<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spotify;
use Illuminate\Support\Collection;
use Illuminate\Support\Arr;

class Pesquisa extends Component
{

    public $entrada = '';

    public $musicas = [];

    public $paginaAtual = 1;

    public $resultadosExibidosPorPagina = 20;

    public $ultimaPagina = 0;


    
    public function pesquisar()
    {
        $this->musicas = [];
        $this->paginaAtual = 1;

        $resultado = Spotify::searchTracks($this->entrada)->get();

        $this->musicas = $resultado['tracks']['items'];
        $resultadosEncontrados = $resultado['tracks']['total'];
        if($resultadosEncontrados > 0){
            $this->ultimaPagina = ceil($resultadosEncontrados/$this->resultadosExibidosPorPagina);
        }

    }
    
    public function proxima() {
        if($this->paginaAtual < $this->ultimaPagina)
        {
            $offset = $this->resultadosExibidosPorPagina * ($this->paginaAtual);
            $resultado = Spotify::searchTracks($this->entrada)->offset($offset)->get();
    
            $this->musicas = $resultado['tracks']['items'];

            $this->paginaAtual += 1;
        }
    }

    public function anterior() {
        if($this->paginaAtual > 1)
        {
            $this->paginaAtual -= 1;
            $offset = $this->resultadosExibidosPorPagina * ($this->paginaAtual - 1);
            $resultado = Spotify::searchTracks($this->entrada)->offset($offset)->get();
    
            $this->musicas = $resultado['tracks']['items'];

        }
    }


    public function render()
    {

        return view('livewire.pesquisa');
    }


}
