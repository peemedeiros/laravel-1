<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tarefa;

class HomeController extends Controller
{
    public function __invoke(){
        Tarefa::where('resolvido', 0)->update([
            'resolvido'=> 1
        ]);

        echo "Editado com sucesso";
        // return view('welcome');
    }
}
