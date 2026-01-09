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
                <h1 class="text-center mb-4" style="color: darkcyan"><u>Users Details</u></h1>
                <table class="table table-bordered table-striped text-center">

                    {{-- Table Header --}}
                    <thead>
                        <tr>
                            <th style="color:darkcyan">SL</th>

                                @foreach($column as $label)
                                    <th style="color:darkcyan">{{ $label }}</th>
                                @endforeach

                            <th style="color:darkcyan">Actions</th>
                        </tr>
                    </thead>


                    {{-- Table Body --}}
                    <tbody>
                        @foreach($data as $index => $row)
                            <tr>
                                {{-- Serial --}}
                                <td style="color:darkblue">{{ $index + 1 }}</td>

                                {{-- Data --}}
                                @foreach($column as $key => $label)
                                    <td style="color:darkblue">
                                        {{ $row->$key }}
                                    </td>
                                @endforeach

                                {{-- Actions --}}
                                <td>
                                    @foreach($actions as $action)

                                        @if($action['method'] === 'GET')
                                            <a href="{{ route($action['route'], $row->id) }}"
                                            class="{{ $action['class'] }}">
                                                {{ $action['label'] }}
                                            </a>
                                        @else
                                            <form action="{{ route($action['route'], $row->id) }}"
                                                method="POST"
                                                style="display:inline-block">
                                                @csrf
                                                @method($action['method'])
                                                <button class="{{ $action['class'] }}"
                                                    onclick="return confirm('{{ $action['confirm'] ?? '' }}')">
                                                    {{ $action['label'] }}
                                                </button>
                                            </form>
                                        @endif

                                    @endforeach
                                </td>
                            </tr>
                        @endforeach
                    </tbody>


                </table>
            </div>
        </div>
    </div>

</body>
</html>
