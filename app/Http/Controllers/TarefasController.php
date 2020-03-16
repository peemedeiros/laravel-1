<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
use App\Tarefa; 

class TarefasController extends Controller
{
    public function list(){
        //query builder
        // $list = DB::select('SELECT * FROM tarefas');

        //ORM Eloquent
        $list = Tarefa::all();

        return view('tarefas.list', [
            'list' => $list
        ]);
    }
    public function add(){
        return view('tarefas.add');
    }
    public function addAction( Request $request){
        $request->validate([
            'titulo'=> ['required', 'string']
        ]);

        $titulo = $request->input('titulo');
        
        //Query Builder
        //DB::insert('INSERT INTO tarefas (titulo) VALUES (:titulo)', ['titulo' => $titulo]);

        //ORM Eloquent
        $tarefa = new Tarefa;
        $tarefa->titulo = $titulo;
        $tarefa->save();

        return redirect()->route('tarefas.list');
    }
    public function edit($id){
        //Query Builder
        // $data = DB::select('SELECT * FROM tarefas WHERE id =:id', [
        //         'id' => $id
        // ]);

        $data = Tarefa::find($id);

        if($data){
            return view( 'tarefas.edit', ['data' => $data ] );
        }else{
            return redirect()->route('tarefas.list');
        }

        return view('tarefas.edit');
    }
    public function editAction(Request $request, $id){
        $request->validate([
            'titulo'=> ['required', 'string']
        ]);
        
        $titulo = $request->input('titulo');
        
        //Query builder
        // DB::update('UPDATE tarefas SET titulo =:titulo WHERE id =:id', [
        //     'id'=>$id,
        //     'titulo'=>$titulo
        // ]);
        
        //ORM eloquent maneira 1
        // $tarefa = Tarefa::find($id);
        // $tarefa->titulo = $titulo;
        // $tarefa->save();

        //ORM eloquent maneira 2
        Tarefa::find($id)->update(['titulo' => $titulo]);

        return redirect()->route('tarefas.list');
    }
    public function del($id){
        // query builder
        // DB::delete('DELETE FROM tarefas WHERE id = :id', [
        //     'id'=>$id
        // ]);
        
        //ORM Eloquent
        Tarefa::find($id)->delete();

        return redirect()->route('tarefas.list');

    }
    public function done($id){
        //Query builder
        // DB::update('UPDATE tarefas SET resolvido = 1 - resolvido WHERE id = :id', [
        //     'id'=>$id
        // ]);
        
        //ORM Eloquent
        $tarefa = Tarefa::find($id);

        if($tarefa){
            $tarefa->resolvido = 1 - $tarefa->resolvido;
            $tarefa->save();
        }

        return redirect()->route('tarefas.list');
    }
}
