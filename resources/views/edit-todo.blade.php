<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <div class="row justify-content-center mt-5">
        <div class="col-lg-6">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">
                        {{ $error }}
                    </div>
                @endforeach
                <button>OK</button>
            @endif
        </div>
    </div>


    <div class="text-center mt-5">
        <h2>@lang('task.edit') @lang('task.task')</h2>
    </div>

    <form method="POST" action="{{ route('todos.update', ['todo' => $todo->id]) }}">

        @csrf

        {{ method_field('PUT') }}

        <div class="row justify-content-center mt-5">

            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label">@lang('task.title')</label>
                    <input type="text" class="form-control" name="titulo" placeholder="@lang('task.title')"
                        value="{{ $todo->titulo }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">@lang('task.status')</label>
                    <select name="concluido" id="" class="form-control">
                        <option value="1" @if ($todo->concluido == 1) selected @endif>@lang('task.completed')
                        </option>
                        <option value="0" @if ($todo->concluido == 0) selected @endif>@lang('task.uncompleted')
                        </option>
                    </select>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">@lang('task.edit')</button>
                </div>
            </div>

    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>
