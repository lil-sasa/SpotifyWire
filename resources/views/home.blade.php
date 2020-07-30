@extends('layouts.app')
@section('content')


<livewire:pesquisa>

    
@endsection

@push('scripts')
    <script>
        function resetarScroll(){
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    </script>
@endpush
