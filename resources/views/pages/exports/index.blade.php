<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Users Data</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
</head>
<body>
<div class="container m-lg-3" >
    <a href="{{route('users')}}" class="btn btn-success btn-sm" role="button"
       aria-pressed="true">Go To Users</a><br><br>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Export by</th>
            <th>Path</th>
            <th>Status</th>
            <th>Download</th>
        </tr>
        </thead>
        <tbody>
        @foreach($exports as $export)
            <tr>
                <td>{{ $export->id }}</td>
                <td>{{ $export->user->name }}</td>
                <td>{{ $export->path }}</td>
                <td>{{ $export->status }}</td>
                <td>
                    @if($export->status=='completed')
                    <a href="{{route('users.export.download',$export->id)}}" class="btn btn-success btn-sm" role="button"
                        aria-pressed="true">download</a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{-- Pagination --}}
    {{ $exports->links() }}
</div>
</body>
</html>
