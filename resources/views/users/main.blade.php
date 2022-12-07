@extends('layouts.main')
@section('content')
    <h1>Select of actions</h1>
    
      <form> 
        {{-- <div class="mb-3">
          <label for="exampleInputToken" class="form-label">Access token</label>
          <input type="token" class="form-control" id="exampleInputToken">
          <div id="emailHelp" class="form-text">Enter access token.</div>
        </div>
        <div class="mb-3">
          <label for="exampleInputId" class="form-label">User Id</label>
          <input type="id" class="form-control" id="exampleInputId">
          <div id="emailHelp" class="form-text">Id user</div>
        </div> --}}
        <a href="/users" class="btn btn-primary">GET all users</a>
        <a href="/user" class="btn btn-primary">GET one user</a>
        <a href="/update" class="btn btn-warning">PUT update user</a>
        <a href="/register" class="btn btn-success">POST register user</a>
        <a href="/user" class="btn btn-danger">DELET  user</a>
      </form>
</html>

@endsection