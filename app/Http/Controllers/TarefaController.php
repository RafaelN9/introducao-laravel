<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Tarefa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TarefaController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $tarefas = Tarefa::all();
        $tarefas = array_map(function ($tarefa) {
            $tarefa['created_at'] = Carbon::parse($tarefa['created_at']);
            $tarefa['updated_at'] = Carbon::parse($tarefa['updated_at']);
            return $tarefa;
        }, $tarefas->toArray());
        return view('tarefa', compact('tarefas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('add-tarefa');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'titulo' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('tarefa.index')->withErrors($validator);
        }

        Tarefa::create([
            'titulo' => $request->get('titulo'),
            'descricao' => $request->get('descricao')
        ]);

        return redirect()->route('tarefa.index')->with('success', __('task.created_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $tarefa = Tarefa::where('id', $id)->first();
        return view('tarefa', compact('tarefa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $tarefa = Tarefa::where('id', $id)->first();
        return view('edit-tarefa', compact('tarefa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'titulo' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('tarefa.edit', ['tarefa' => $id])->withErrors($validator);
        }



        $tarefa = Tarefa::where('id', $id)->first();
        $tarefa->titulo = $request->get('titulo');
        $tarefa->descricao = $request->get('descricao');
        $tarefa->concluido = $request->get('concluido');
        $tarefa->save();

        return redirect()->route('tarefa.index')->with('success',  __('task.edited_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        Tarefa::where('id', $id)->delete();
        return redirect()->route('tarefa.index')->with('success', __('task.deleted_success'));
    }
}
