<!DOCTYPE html>
<html>
    <head>
        <title>SPATIE CRUD</title>
    </head>

    <body>
        <h1>HERE BE ASSIGN ROLES</h1>
        <br>
        <h3 style="text-transform:uppercase">Name: {{ $user[0]->name }}</h3>
        <h3 style="text-transform:uppercase">Role: {{ $roles[0]->name }}</h3>
        <h3>Permissions:</h3>
        <ul>
            @foreach($p as $permission)
                <li style="text-transform:uppercase">{{ $permission[0]->name }}</li>
            @endforeach  
        </ul>
        <br>
        <p>Assign Roles and Permissions</p>
        <form action="{{ route('assignUpdate', $user[0]->id) }}" method="post">
            @csrf
            <label for="role">Role: </label>
            <input  name="ogRole" id="ogRole" value="{{ $roles[0]->name }}" hidden>
            <select name="role" id="role">
                @foreach($allRoles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
            <br>
            <br>
            <button type="submit">Submit</button>
            <button><a href="{{ route('index') }}">Back</button>
        </form>       
    </body>
</html>