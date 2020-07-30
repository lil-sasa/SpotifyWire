<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArtistaController extends Controller
{
    public function show($id) {
        return view('artista', compact('id'));
    }
}
