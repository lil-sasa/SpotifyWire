<div class="flex flex-wrap justify-center items-center overflow-hidden">
    
    {{-- Card Artista --}}
    <div class="w-full container mx-auto max-w-xs rounded-lg overflow-hidden shadow-lg my-6 bg-white ">
        <div class="relative z-10" style="clip-path: polygon(0 0, 100% 0, 100% 100%, 0 calc(100% - 5vw));">
            <img class="" src="{{ $imagem }}"
                    alt="Artista"/>
        </div>
        <div class="relative flex justify-end items-center flex-row px-6 z-50 -mt-10">

            <button onclick="favoritar()"
                id="botao_favorito"
                class="py-4 px-6 rounded-full transition ease-in duration-200 focus:outline-none">
                <span class="w-100 h-100">★</span>    
            </button>
        </div>
        <div class="pt-6 pb-8 text-gray-600 text-center">
            <p>{{ $nome }} </p>
            <p class="text-sm">{{ $genero }}</p>
        </div>
        <div class="pb-10 uppercase text-center tracking-wide flex justify-center">
            <div class="followers">
                <p class="text-gray-400 text-sm">Seguidores</p>
                <p class="text-lg font-semibold text-blue-300">{{ $seguidores }}</p>
            </div>
        </div>
    </div>
    {{-- !/Card Artista --}}

    {{-- Albuns --}}
    <div class="main-images mb-8 flex flex-wrap md:p-3 lg:p-3 sm:p-0 sm:w-full">
        <div class="images grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach ($albuns as $album)
                <div class="image bg-white rounded-lg shadow-lg overflow-hidden">
                    <img src="{{ $album->images[0]->url }}" alt="Album" title="Contact with Customer support">
                    <span class="text-center p-2 text-gray-700 text-sm inline-block w-full">{{ $album->name }}</span>
                </div>
            @endforeach

        </div>
    </div>

    {{-- !/Albuns --}}


    <div class="absolute top-0 left-0 m-5">
        <a href="/">
            <span class=" hover:bg-green-600 hover:cursor-pointer tracking-wider text-white bg-green-500 px-4 py-1 text-sm rounded leading-loose mx-2 font-semibold" title="">
                <i class="fas fa-undo" aria-hidden="true"></i> Voltar
            </span>
        </a>
    </div>
</div>

   



@push('scripts')
<script type="text/javascript">

    document.addEventListener("turbolinks:load", function() {
        let botaoFavorito = document.getElementById('botao_favorito');
        let isFavorito = getFavorito(@this.get('identificador'));
        let classe = '';
        if(isFavorito) {
            botaoFavorito.classList.add('bg-green-600', 'hover:bg-gray-500' );
        } else {
            botaoFavorito.classList.add('bg-gray-600', 'hover:bg-green-500' );
        }
    })
    

    function favoritar() {
        let id = @this.get('identificador');
        let nome = @this.get('nome');

        let botaoFavorito = document.getElementById('botao_favorito');
        
        let favorito = getFavorito(id);

        if(favorito)
        {
            localStorage.removeItem(id);
            botaoFavorito.classList.remove('bg-green-600', 'hover:bg-gray-500');
            botaoFavorito.classList.add('bg-gray-600', 'hover:bg-green-500');
        } else {
            localStorage.setItem(id, nome);
            botaoFavorito.classList.remove('bg-gray-600', 'hover:bg-green-500');
            botaoFavorito.classList.add('bg-green-600','hover:bg-gray-500');
        }
    }

    function getFavorito(id) {
        return localStorage.getItem(id);
    }
</script>
@endpush