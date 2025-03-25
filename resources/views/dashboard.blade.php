<!DOCTYPE html>
<html>
    <head>
        <title>SPATIE CRUD</title>
    </head>

    <body>
        <h1>HERE BE USERS</h1>
        <br>
        <table style="text-align:center">
            <thead>
                <tr>
                    <th style="width: 200px">NAME</th>
                    <th style="width: 200px">EMAIL</th>
                </tr>
            </thead>

            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td style="width: 200px">{{ $user->name }}</td>
                        <td style="width: 200px">{{ $user->email }}</td>
                        <td style="width: 200px">
                            <a href="{{ route('show', $user->id) }}">Show</a>
                            <a href="{{ route('edit', $user->id) }}">Edit</a>
                            <a href="{{ route('assign', $user->id) }}">Role Assign</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        <button type="button"><a href="{{ route('create') }}">Create User</a></button>
    </body>
</html>