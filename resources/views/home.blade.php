@extends('layouts.app')
@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet">

<div class="p-10 flex flex-wrap sys-app-notCollapsed ">
    <div class="p-4 w-full lg:w-100">
        <div class="p-2 text-gray-900 bg-white rounded-lg shadow-lg ">
          <span class="px-2 mr-2 border-r border-gray-800">
            <img src="{{ asset('img/logo.png') }}"
              alt="alt placeholder" class="w-8 h-8 -mt-1 inline mx-auto">
          </span>

          <span class="px-1 cursor-pointer hover:text-gray-700">
            <input class="bg-transparent border-none mr-3 px-2 leading-tight focus:outline-none" type="text" placeholder="Procurar">
            <i class="fas fa-search"></i>
          </span>

        </div>
    </div>
</div>

    
@endsection
