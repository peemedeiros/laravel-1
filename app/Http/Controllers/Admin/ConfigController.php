<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function index(Request $request) {

        //o metodo all trara todos os dados enviados na requisicao idependente do verbo da requisicao
        // $data = $request->all();

        //O input serve para buscar dados no corpo da requisicao (POST), nao encontrando-os, o input trara os dados contidos na url
        // $cidade = $request->query('cidade','sao paulo');
        
        //o metodo method() traz o tipo de requisicao que foi realizada
        // $method = $request->method();

        //Com o metodo only() podemos escolher quais os dados da requisicao iremos utilizar, mesmo que essa requisicao nos traga mais dados
        // $dados = $request->only(['nome', 'idade']);

        //O except() marca quais os dados nao serao mostrados na requisicao
        // $dados = $request->except(['nome']);
        
        //O query busca exclusivamente os dados da url
        // $data = $request->query();
        
        // echo "Meu nome eh: ".$data['nome']." e tenho ".$data['idade']." anos";

        $nome = "Pedro";
        $idade = 22;
        $cidade = $request->input('cidade');
        $lista = [
            ['nome'=>'farinha','qt'=>'2'],
            ['nome'=>'ovo','qt'=>'6'],
            ['nome'=>'leite','qt'=>'3'],
            ['nome'=>'massa','qt'=>'1'],
        ];

        $data = [
            'nome'=>$nome,
            'idade'=>$idade,
            'cidade'=>$cidade,
            'lista'=>$lista
        ];
        

        return view('admin.config', $data);
    }

    public function info() {
        echo "Configuracao 3";
    }

    public function permissoes() {
        echo "Permissao 3";
    }
}
