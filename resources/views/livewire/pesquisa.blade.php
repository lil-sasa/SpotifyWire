<div class="relative">

    <div class="flex justify-center mt-5">
        <img src="{{ secure_asset('img/spotifyWire.png') }}">
    </div>
    {{-- Barra de pesquisa --}}
    <div class="p-5 flex flex-wrap sys-app-notCollapsed justify-center mb-8"> 
      
            <div class="p-2 text-gray-900 bg-white rounded-lg shadow-lg sm:w-full md:w-full lg:w-1/2 xl:w-70 flex">
                
                    <span class="px-1 w-1/6">
                        <img src="{{ secure_asset('img/logo.png') }}"
                            alt="alt placeholder" class="w-8 h-8 -mt-1 inline mx-auto">
                    </span>
                    <input wire:offline.attr="disabled"
                        class="bg-transparent border-none px-2 leading-tight focus:outline-none hover:text-gray-700 w-3/6"
                        wire:model.debounce.10000ms="entrada"
                        wire:keydown.enter="pesquisar"
                        wire:loading.attr="disabled"
                        type="text" placeholder="Procurar">   
                    <a class="w-1/6 text-center mr-2 justify-end cursor-pointer"
                        wire:offline.attr="disabled"
                        wire:click="pesquisar"
                        wire:loading.attr="disabled"><i class="fas fa-search"></i></a>


            </div>
 
    </div>
    {{-- !/Barra de pesquisa --}}
       
    {{-- Cards dos resultados --}}
        <div class="flex flex-wrap md:p-3 lg:p-3 sm:p-0 sm:w-full">
            @if(!empty($musicas))

                @foreach ($musicas as $musica)
                    <div class="max-w-xs flex-none bg-white shadow-lg rounded-lg my-4 mx-auto">
    
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
                                    @foreach ($musica->artists as $artista)
                                        <a href="{{ route('artista', $artista->id) }}">☆{{ $artista->name }}</a>
                                    @endforeach
                                </h1>
                            </div>
                        </div>
                    </div>
                     
                @endforeach 
            @endif
        </div>

        {{-- !/Cards dos resultados --}}

        {{-- Paginação --}}
      <div class="p-5">
         <div class="flex justify-center items-baseline flex-wrap">
            <div class="flex m-2">
                @if(!empty($musicas))
           
                    @if ($paginaAtual > 1)
                        <div>
                            <button wire:click="anterior" onclick="resetarScroll()" class="text-base rounded-r-none border-r-0  hover:scale-110 focus:outline-none flex justify-center px-4 py-2 rounded font-bold cursor-pointer 
                                hover:bg-teal-200  
                                bg-teal-100 
                                text-teal-700 
                                border duration-200 ease-in-out 
                                border-teal-600 transition"
                                >   
                                <div class="flex leading-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left w-5 h-5">
                                        <polyline points="15 18 9 12 15 6"></polyline>
                                    </svg>
                                    Anterior</div>
                            </button> 
                        </div>                    
                    @else
                        <button disabled class="text-base rounded-r-none flex justify-center px-4 py-2 rounded font-bold 
                            bg-gray-100 
                            text-gray-700 
                            border-gray-600">
                            <div class="flex leading-5">
                                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left w-5 h-5">
                                    <polyline points="15 18 9 12 15 6"></polyline>
                                </svg>
                                Anterior</div>
                        </button> 
                    @endif

                    @if ($paginaAtual < $ultimaPagina)
                    <div>
                        <button wire:click="proxima" onclick="resetarScroll()" class="text-base  rounded-l-none border-l-0  hover:scale-110 focus:outline-none flex justify-center px-4 py-2 rounded font-bold cursor-pointer 
                            hover:bg-teal-200  
                            bg-teal-100 
                            text-teal-700 
                            border duration-200 ease-in-out 
                            border-teal-600 transition">
                                <div class="flex leading-5">Próxima
                                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right w-5 h-5 ml-1">
                                        <polyline points="9 18 15 12 9 6"></polyline>
                                    </svg>
                                </div>
                        </button>
                    </div> 
                    @else
                        <button disabled class="text-base rounded-r-none flex justify-center px-4 py-2 rounded font-bold 
                            bg-gray-100 
                            text-gray-700 
                            border-gray-600">
                            <div class="flex leading-5">Próxima
                                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right w-5 h-5 ml-1">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </div>
                        </button>
                    @endif
                @endif
                        
            </div>
            </div>
        </div>
        {{-- !/Paginação --}}

        {{-- Footer --}}
        <div class="container bg-green-100 p-8">
            <div class="sm:flex mb-4">
          <div class="sm:w-1/4 h-auto">
              <div class="text-green mb-2 text-green-500">Favoritos</div>
              <ul class="list-reset leading-normal" id="lista_favoritos">
              </ul>
          </div>
          <div class="sm:w-1/4 h-auto sm:mt-0 mt-8">
              <div class="mb-2 text-indigo">Appmasters</div>
              <ul class="list-reset leading-normal">
                  <li class="hover:text-indigo text-grey-darker"><a href="https://appmasters.io/pt/" target="_blank">Website</a></li>
                  <li class="hover:text-indigo text-grey-darker"><a href="https://www.instagram.com/appmasters.io/" target="_blank"> Instagram</a></li>
                  <li class="hover:text-indigo text-grey-darker"><a href="https://www.linkedin.com/company/appmasters.io/" target="_blank">Linkedin</a></li>
              </ul>
        
            <div class="text-blue mb-2 mt-4">Igor Sasaoka</div>
              <ul class="list-reset leading-normal">
                  <li class="hover:text-blue text-grey-darker"><a href="https://www.instagram.com/sasaoka.js/" target="_blank">Instagram</a></li>
                  <li class="hover:text-blue text-grey-darker"><a href="https://www.linkedin.com/in/igor-sasaoka/" target="_blank">Linkedin</a></li>
                  <li class="hover:text-blue text-grey-darker"><a href="https://sasaoka.tech" target="_blank">Website</a></li>
              </ul>
        
          </div>
          <div class="sm:w-1/4 h-auto sm:mt-0 mt-8">
                    <div class="text-red mb-2">Tecnologias Utilizadas</div>
              <ul class="list-reset leading-normal">
                  <li class="hover:text-red text-grey-darker"><a href="https://laravel.com/" target="_blank">Laravel</a></li>
                  <li class="hover:text-red text-grey-darker"><a href="https://laravel-livewire.com/" target="_blank">LiveWire</a></li>
                  <li class="hover:text-red text-grey-darker"><a href="https://github.com/turbolinks/turbolinks" target="_blank">TurboLinks</a></li>
              </ul>
        
            <div class="text-green-400 mb-2 mt-4">API</div>
              <ul class="list-reset leading-normal">
                  <li class="hover:text-green-400 text-grey-darker"><a href="https://developer.spotify.com/" target="_blank">Spotify</a></li>
              </ul>
        
        
          </div>
          <div class="sm:w-1/2 sm:mt-0 mt-8 h-auto">
            <div class="text-green mb-2">Projeto</div>
            <p classxt="te-grey-darker leading-normal">Este é um projeto ficcional para fins de processo seletivo :)</p>
            
        </div>
    
        
        </div>
        </div>
        {{-- !/Footer --}}

        {{-- Loading --}}
        <div wire:loading>
            <div class="w-full h-full fixed block top-0 left-0 bg-white opacity-75 z-50">
                <span class="text-green-500 opacity-75 top-1/2 my-0 mx-auto block relative w-0 h-0" style="
                  top: 50%;
              ">
                  <i class="fas fa-circle-notch fa-spin fa-5x"></i>
                </span>
              </div>
        </div>
        {{-- !/Loading --}}


        {{-- Offline --}}
        <div wire:offline>
            Sem conexão com a internet, verifique antes de continuar.
        </div>
        {{-- !/Offline --}}

</div>




@push('scripts')
<script type="text/javascript">
    
    function preencherFavoritos() {
        const items = { ...localStorage };
        let ul = document.getElementById('lista_favoritos');
        Object.entries(items).forEach(element => {

            let li = document.createElement('li');
            let a = document.createElement('a');
            
            let texto = document.createTextNode('☆' + element[1]);

            a.setAttribute('class','hover:text-green-500 text-grey-darker');
            a.href = 'artist/' + element[0];

            a.appendChild(texto);
            li.appendChild(a);
            ul.appendChild(li);

        });
    }
    document.addEventListener("turbolinks:load", function() {
        
        preencherFavoritos();
    })



</script>
@endpush