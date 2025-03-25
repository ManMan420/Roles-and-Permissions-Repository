<!DOCTYPE html>
<html>
    <head>
        <title>SPATIE CRUD</title>
    </head>
    <body>
        <h1>HERE BE USER</h1>
        <br>
        <form action="{{ route('update', $user->id) }}" method="post">
            @csrf
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ $user->name }}">
            <br>
            <br>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ $user->email }}">
            <br>
            <br>
            <label for="email">Password</label>
            <input type="text" name="password" id="password" value="{{ $user->password }}">
            <br>
            <br>
            <button type="submit">Submit</button>
            <button type="button"><a href="{{ route('delete', $user->id) }}">Delete</a></button>
        </form>

    </body>
</html>