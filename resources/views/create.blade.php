<!DOCTYPE html>
<html>
    <head>
        <title>SPATIE CRUD</title>
    </head>

    <boody>
        <h1>HERE BE NEW USER</h1>
        <br>
        <form action="{{ route('store') }}" method="post">
            @csrf
            <label for="name">Name</label>
            <input type="text" name="name" id="name">
            <br>
            <br>
            <label for="email">Email</label>
            <input type="email" name="email" id="email">
            <br>
            <br>
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
            <br>
            <br>
            <label for="role">Role</label>
            <select name="role" id="role">
                @foreach($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
            <br>
            <br>
            <button type="submit">Submit</button>
        </form>
    </boody>
</html>