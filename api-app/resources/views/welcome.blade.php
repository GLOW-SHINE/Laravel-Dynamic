<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Users</title>
</head>

<body class="d-flex justify-content-center align-items-start vh-100 pt-5">

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-auto">

            <h1 class="text-center mb-4" style="color: darkcyan">
                <u>Users Details</u>
            </h1>

            <table class="table table-bordered table-striped text-center">

                {{-- Table Header auto --}}
                <thead>
                <tr>
                    {{-- @foreach(array_keys((array) $data->first()) as $col)
                        <th>{{ ucfirst($col) }}</th>
                    @endforeach --}}

                    @foreach($column as $label)
                        <th>{{$label}}</th>
                    @endforeach
                </tr>
                </thead>

                {{-- Table Body --}}
                <tbody>
                @foreach($data as $row)
                    <tr>
                        @foreach($row as $value)
                            <td>{{ $value }}</td>
                        @endforeach
                    </tr>
                @endforeach
                </tbody>

            </table>

        </div>
    </div>
</div>

</body>
</html>
