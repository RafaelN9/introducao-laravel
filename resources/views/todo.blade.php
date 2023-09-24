<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>@lang('task.tasks')</title>
</head>

<body>
    <div class="row justify-content-center mt-5">
        <div class="col-lg-6">
            @if (session()->has('success'))
                <div class="alert alert-success d-flex justify-content-between align-items-center">
                    {{ session()->get('success') }}
                    <button class="btn btn-success">OK</button>
                </div>
            @endif

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">
                        {{ $error }}
                    </div>
                @endforeach
            @endif
        </div>
    </div>



    <div class="text-center">

        <div class="d-flex justify-content-center m-2">
            <h2 class="d-inline me-1">@lang('task.tasks')</h2>
            <a href="{{ route('todos.create') }}" class="btn btn-info">@lang('task.add_task')</a>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-6">

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">@lang('task.id')</th>
                            <th scope="col">@lang('task.title')</th>
                            <th scope="col">@lang('task.created_at')</th>
                            <th scope="col">@lang('task.status')</th>
                            <th scope="col">@lang('task.action')</th>
                        </tr>
                    </thead>
                    <tbody>


                        @foreach ($todos as $todo)
                            <tr>

                                <th>{{ $todo->id }}</th>
                                <td>{{ $todo->titulo }}</td>
                                <td>{{ $todo->created_at }}</td>
                                <td>
                                    @if ($todo->concluido)
                                        <div class="badge
                                    bg-success">
                                            @lang('task.completed')
                                        </div>
                                    @else
                                        <div class="badge bg-warning">@lang('task.uncompleted')</div>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('todos.edit', ['todo' => $todo->id]) }}"
                                        class="btn btn-info">@lang('task.edit')</a>
                                    <form class="d-inline" method="POST"
                                        action="{{ route('todos.destroy', ['todo' => $todo->id]) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">@lang('task.delete')</a>
                                    </form>

                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>
