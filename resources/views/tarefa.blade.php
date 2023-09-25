@extends('layout')
@section('title', 'Todo List')

@section('content')
    <div class="d-flex flex-row justify-content-between m-4">
        <h2 class="d-inline me-1">@lang('task.tasks')</h2>
        <a href="{{ route('tarefa.create') }}" class="btn btn-info">@lang('task.add_task')</a>
    </div>

    <div class="row justify-content-center">
        <div class="">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">@lang('task.id')</th>
                        <th scope="col">@lang('task.title')</th>
                        <th scope="col">@lang('task.description')</th>
                        <th scope="col">@lang('task.created_at')</th>
                        <th scope="col">@lang('task.status')</th>
                        <th scope="col">@lang('task.action')</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($tarefas as $tarefa)
                        <tr>

                            <th>{{ $tarefa['id'] }}</th>
                            <td>{{ $tarefa['titulo'] }}</td>
                            <td>{{ $tarefa['descricao'] }}</td>
                            <td>{{ $tarefa['updated_at']->toDayDateTimeString() }}</td>
                            <td>
                                @if ($tarefa['concluido'])
                                    <div class="badge
                                    bg-success">
                                        @lang('task.completed')
                                    </div>
                                @else
                                    <div class="badge bg-warning">@lang('task.uncompleted')</div>
                                @endif
                            </td>
                            <td class="d-flex flex-column" style="gap: 1em">
                                <a href="{{ route('tarefa.edit', ['tarefa' => $tarefa['id']]) }}"
                                    class="btn btn-info">@lang('task.edit')</a>
                                <form class="d-inline" method="POST"
                                    action="{{ route('tarefa.destroy', ['tarefa' => $tarefa['id']]) }}">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger w-100">@lang('task.delete')</a>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
