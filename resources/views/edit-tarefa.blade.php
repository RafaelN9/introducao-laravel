@extends('layout')
@section('title', 'Todo List - Editar Tarefa')
@section('content')

    <div class="text-center mt-5">
        <h2>@lang('task.edit') @lang('task.task')</h2>
    </div>

    <form method="POST" action="{{ route('tarefa.update', ['tarefa' => $tarefa->id]) }}">

        @csrf

        {{ method_field('PUT') }}

        <div class="row justify-content-center mt-5">

            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label">@lang('task.title')</label>
                    <input type="text" class="form-control" name="titulo" placeholder="@lang('task.title')"
                        value="{{ $tarefa->titulo }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">@lang('task.description')</label>
                    <textarea class="form-control" name="descricao" placeholder="@lang('task.description')" cols=2 rows=2>{{ $tarefa->descricao }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">@lang('task.status')</label>
                    <select name="concluido" id="" class="form-control">
                        <option value="1" @if ($tarefa->concluido == 1) selected @endif>@lang('task.completed')
                        </option>
                        <option value="0" @if ($tarefa->concluido == 0) selected @endif>@lang('task.uncompleted')
                        </option>
                    </select>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">@lang('task.edit')</button>
                </div>
            </div>

    </form>
@endsection
