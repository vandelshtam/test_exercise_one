@extends('layouts.main')
@section('content')
    <h1>Select of actions</h1>
      <form> 
        <a href="/users" class="btn btn-primary">GET all users</a>
        <a href="/user" class="btn btn-primary">GET one user</a>
        <a href="/update" class="btn btn-warning">PUT update user</a>
        <a href="/register" class="btn btn-success">POST register user</a>
        <a href="/delete" class="btn btn-danger">DELET  user</a>
      </form>
</html>

@endsection