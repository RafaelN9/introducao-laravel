@extends('layout')
@section('title', 'Todo List - Adicionar Tarefa')
@section('content')
    <h2 class="text-center py-4">@lang('task.add_task')</h2>


    <form class="text-start row g-3 justify-content-center" method="POST" action="{{ route('tarefa.store') }}">
        @csrf
        <div class="col-lg-6">
            <div class="mb-3">
                <label class="form-label">@lang('task.title')</label>
                <input type="text" class="form-control" name="titulo" placeholder="@lang('task.title')">
            </div>
            <div class="mb-3">
                <label class="form-label">@lang('task.description')</label>
                <textarea class="form-control" name="descricao" placeholder="@lang('task.description')" cols=2 rows=5></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">@lang('task.status')</label>
                <select name="concluido" disabled id="" class="form-control">
                    <option value="0">@lang('task.uncompleted')
                    </option>
                </select>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">@lang('task.create')</button>
            </div>
        </div>
    </form>
@endsection
