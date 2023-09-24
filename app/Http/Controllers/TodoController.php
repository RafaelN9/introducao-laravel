<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $todos = Todo::all();
        return view('todo', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('add-todo');
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
            return redirect()->route('todos.index')->withErrors($validator);
        }

        Todo::create([
            'titulo' => $request->get('titulo')
        ]);

        return redirect()->route('todos.index')->with('success', __('task.created_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $todo = Todo::where('id', $id)->first();
        return view('edit-todo', compact('todo'));
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
            return redirect()->route('todos.edit', ['todo' => $id])->withErrors($validator);
        }



        $todo = Todo::where('id', $id)->first();
        $todo->titulo = $request->get('titulo');
        $todo->concluido = $request->get('concluido');
        $todo->save();

        return redirect()->route('todos.index')->with('success',  __('task.edited_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        Todo::where('id', $id)->delete();
        return redirect()->route('todos.index')->with('success', __('task.deleted_success'));
    }
}
