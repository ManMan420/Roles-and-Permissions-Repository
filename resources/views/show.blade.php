<!DOCTYPE html>
<html>
    <head>
        <title>SPATIE CRUD</title>
    </head>

    <body>
        <h1 style="text-transform:uppercase">HERE BE {{ $user[0]->name }}</h1>
        <h3 style="text-transform:uppercase">ROLE: {{ $roles[0]->name }}</h3>
        <br>
        <table style="text-align:center">
            <thead>
                <tr>
                    <th style="width: 200px">Permissions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($p as $pName)
                    <tr>
                        <td style="width: 200px; text-transform:uppercase">{{$pName[0]->name}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        <button><a href="{{ route('index') }}">Back</button>
    </body>
</html>