@extends('layouts.app')

@section('content')
  <div class="card">
    <div class="card-header">Floating Labels</div>
    <div class="card-body">
      <div class="form-floating mb-3">
        <input type="email" class="form-control" id="floatingEmail" placeholder="name@example.com">
        <label for="floatingEmail">Email address</label>
      </div>

      <div class="form-floating mb-3">
        <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Password</label>
      </div>

      <div class="form-floating mb-0">
        <textarea class="form-control" placeholder="Leave a comment" id="floatingComment" style="height: 100px"></textarea>
        <label for="floatingComment">Comments</label>
      </div>
    </div>
  </div>
@endsection
