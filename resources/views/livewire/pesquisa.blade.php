<div class="p-10 flex flex-wrap sys-app-notCollapsed ">
    <div class="p-4 w-full lg:w-100">
        <div class="p-2 text-gray-900 bg-white rounded-lg shadow-lg ">

            <span class="px-2 mr-2 border-r border-gray-800">
            <img src="{{ asset('img/logo.png') }}"
                alt="alt placeholder" class="w-8 h-8 -mt-1 inline mx-auto">
            </span>
            <span class="px-1 cursor-pointer hover:text-gray-700">
                <input wire:offline.attr="disabled"
                class="bg-transparent border-none mr-3 px-2 leading-tight focus:outline-none"
                wire:model.debounce.10000ms="entrada"
                wire:keydown.enter="pesquisar"
                wire:loading.attr="disabled"
                type="text" placeholder="Procurar">
                
                <a wire:offline.attr="disabled"
                wire:click="pesquisar"
                wire:loading.attr="disabled"><i class="fas fa-search"></i></a>
            </span>
            
            
        </div>
    </div>

   

    <div wire:loading.remove>
        @if (isset($musicas))
    
            <ul>
                @foreach ($musicas as $musica)
                 <li>nome: {{ $musica['name']}}</li>
                 
                @endforeach 
            </ul>
            
            @if ($paginaAtual > 1)
                <button wire:click="anterior" class="bg-indigo-900">
                    Anterior
                </button>    
            @endif
            
            @if ($paginaAtual < $ultimaPagina)
                
                <button wire:click="proxima" class="bg-indigo-900">
                    Próximo
                </button>
            @endif
        @endif
    </div>

    <div wire:loading>
        <div class="w-full h-full fixed block top-0 left-0 bg-white opacity-75 z-50">
            <span class="text-green-500 opacity-75 top-1/2 my-0 mx-auto block relative w-0 h-0" style="
              top: 50%;
          ">
              <i class="fas fa-circle-notch fa-spin fa-5x"></i>
            </span>
          </div>
    </div>

</div>



