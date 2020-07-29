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

   

    <div wire:loading.remove class="flex flex-wrap p-3">
        @if (isset($musicas))

            @foreach ($musicas as $musica)
                <div class="max-w-sm flex-none bg-white shadow-lg rounded-lg my-4 mx-auto">

                    <img class="w-50 h-1/4 object-cover object-center rounded-t-md" src="{{$musica->album->images[0]->url }}" alt="avatar">

                    <div class="flex items-center px-6 py-3 bg-gray-900 h-100">
                        <i class="fa fa-headphones h-5 w-6 text-white fill-current align-center"></i>
                        <h1 class="mx-3 text-white font-semibold text-lg">{{ substr($musica->name,0 ,24) }}</h1>
                    </div>
                    <div class="py-4 px-6">
                        <h1 class="text-2xl font-semibold text-gray-800">{{ $musica->album->name }}</h1>
                        <div class="flex items-center mt-4 text-gray-700">
                            <i class="fa fa-users"></i>
                            <h1 class="px-2 text-sm">

                            </h1>
                        </div>
                        <div class="flex items-center mt-4 text-gray-700">
                            <svg class="h-6 w-6 fill-current" viewBox="0 0 512 512">
                                <path d="M256 32c-88.004 0-160 70.557-160 156.801C96 306.4 256 480 256 480s160-173.6 160-291.199C416 102.557 344.004 32 256 32zm0 212.801c-31.996 0-57.144-24.645-57.144-56 0-31.357 25.147-56 57.144-56s57.144 24.643 57.144 56c0 31.355-25.148 56-57.144 56z"/>
                            </svg>
                            <h1 class="px-2 text-sm">California</h1>
                        </div>
                        <div class="flex items-center mt-4 text-gray-700">
                            <svg class="h-6 w-6 fill-current" viewBox="0 0 512 512">
                                <path d="M437.332 80H74.668C51.199 80 32 99.198 32 122.667v266.666C32 412.802 51.199 432 74.668 432h362.664C460.801 432 480 412.802 480 389.333V122.667C480 99.198 460.801 80 437.332 80zM432 170.667L256 288 80 170.667V128l176 117.333L432 128v42.667z"/>
                            </svg>
                            <h1 class="px-2 text-sm">patterson@example.com</h1>
                        </div>
                    </div>
                </div>
                 
            @endforeach 

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



