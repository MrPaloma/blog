<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaginaController extends Controller
{
    public function inicio(){
        
        return view('welcome');

    }

    public function elpepe(){

        return view('ElPepe');

    }
}
