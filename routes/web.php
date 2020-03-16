<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController');

Route::view('/teste', 'teste');

Route::resource('todo', 'ToDoController');
/*
    Com o comando resource, sao criadas automaticamente as rotas de :
    GET - /todo - index - todo.index - LISTA OS ITENS
    GET - /todo/create - create - todo.create - FORM PARA INSERIR
    POST - /todo - store - todo.store - RECEBER OS DADOS E ADD ITEM
    GET - /todo/{id} - show - todo.show - BUSCA POR ID
    GET - /todo/{id}/edit - edit - todo.edit - FORM DE EDICAO
    PUT - /todo/{id} - updade - todo.update - RECEBE OS DADAOS E ATUALIZA
    DELETE - /todo{id} - destroy - todo.destroy - DELETAR O ITEM ESCOLHIDO
*/

Route::prefix('/tarefas')->group(function(){

    Route::get('/', 'TarefasController@list')->name('tarefas.list'); //Listagem de tarefas

    Route::get('add', 'TarefasController@add')->name('tarefas.add'); //Tela de adicao de novas tarefas
    Route::post('add', 'TarefasController@addAction'); //Acao de adicao de nova tarefa  
    
    Route::get('edit/{id}', 'TarefasController@edit')->name('tarefas.edit'); //Tela de edicao
    Route::post('edit/{id}', 'TarefasController@editAction'); //Acao de edicao

    Route::get('delete/{id}', 'TarefasController@del')->name('tarefas.del'); // Acao de deletar

    Route::get('marcar/{id}', 'TarefasController@done')->name('tarefas.done'); // Marcar resolvido ou nao resolvido

});

Route::prefix('/config')->group(function(){

    Route::get('/', 'Admin\ConfigController@index');
    Route::post('/', 'Admin\ConfigController@index');
    Route::get('info', 'Admin\ConfigController@info');
    Route::get('permissoes', 'Admin\ConfigController@permissoes');

});







//slug funcionando como req.query(Node.js)
Route::get('/noticia/{slug}', function($slug){
    echo "Slug: ".$slug;
});
// Passando parametros pela rota
Route::get('/noticia/{slug}/comentario/{id}', function($slug, $id) {
    echo "Mostrando o comentario ".$id." da noticia ".$slug;
});
//passando dados com formatos padronizados por expressoes regulares
Route::get('/user/{name}', function($name){
    echo "Mostrando usuario de nome : ".$name;
})->where('name', '[a-z, A-Z]+');

//O padrao do id foi criado nos providers de rotas (boot)
Route::get('/user/{id}', function($id){
    echo "Mostrando usuario ID : ".$id;
});


Route::fallback(function(){
    return view('404');
});
