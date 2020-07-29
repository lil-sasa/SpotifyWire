<div class="p-10 flex flex-wrap sys-app-notCollapsed ">
    <div class="p-4 w-full lg:w-100">
        <div class="p-2 text-gray-900 bg-white rounded-lg shadow-lg ">

            <span class="px-2 mr-2 border-r border-gray-800">
            <img src="{{ asset('img/logo.png') }}"
                alt="alt placeholder" class="w-8 h-8 -mt-1 inline mx-auto">
            </span>
            <span class="px-1 cursor-pointer hover:text-gray-700">
                <input class="bg-transparent border-none mr-3 px-2 leading-tight focus:outline-none" wire:model="entrada" type="text" placeholder="Procurar">
                <a wire:click="pesquisar"><i class="fas fa-search"></i></a>
            </span>
            
            
        </div>
    </div>

    @if (isset($musicas))

        <ul>
            @foreach ($musicas as $musica)
             <li>nome: {{ $musica['name']}}</li>
             
            @endforeach 
        </ul>
        
        @if ($paginaAtual > 1)
            <button wire:click="anterior">
                Anterior
            </button>    
        @endif
        
        @if ($paginaAtual < $ultimaPagina)
            
            <button wire:click="proxima">
                Próximo
            </button>
        @endif
    @endif
</div>



