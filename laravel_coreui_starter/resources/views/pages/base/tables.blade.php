@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header"><strong>Table</strong> <small>Basic example</small></div>
      <div class="card-body">
        <table class="table">
          <thead>
            <tr><th scope="col">#</th><th scope="col">First</th><th scope="col">Last</th><th scope="col">Handle</th></tr>
          </thead>
          <tbody>
            <tr><th scope="row">1</th><td>Mark</td><td>Otto</td><td>@mdo</td></tr>
            <tr><th scope="row">2</th><td>Jacob</td><td>Thornton</td><td>@fat</td></tr>
            <tr><th scope="row">3</th><td colspan="2">Larry the Bird</td><td>@twitter</td></tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header"><strong>Table</strong> <small>Striped rows</small></div>
      <div class="card-body">
        <table class="table table-striped">
          <thead>
            <tr><th scope="col">#</th><th scope="col">First</th><th scope="col">Last</th><th scope="col">Handle</th></tr>
          </thead>
          <tbody>
            <tr><th scope="row">1</th><td>Mark</td><td>Otto</td><td>@mdo</td></tr>
            <tr><th scope="row">2</th><td>Jacob</td><td>Thornton</td><td>@fat</td></tr>
            <tr><th scope="row">3</th><td colspan="2">Larry the Bird</td><td>@twitter</td></tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header"><strong>Table</strong> <small>Bordered table</small></div>
      <div class="card-body">
        <table class="table table-bordered">
          <thead>
            <tr><th scope="col">#</th><th scope="col">First</th><th scope="col">Last</th><th scope="col">Handle</th></tr>
          </thead>
          <tbody>
            <tr><th scope="row">1</th><td>Mark</td><td>Otto</td><td>@mdo</td></tr>
            <tr><th scope="row">2</th><td>Jacob</td><td>Thornton</td><td>@fat</td></tr>
            <tr><th scope="row">3</th><td colspan="2">Larry the Bird</td><td>@twitter</td></tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header"><strong>Table</strong> <small>Hoverable rows</small></div>
      <div class="card-body">
        <table class="table table-hover">
          <thead>
            <tr><th scope="col">#</th><th scope="col">First</th><th scope="col">Last</th><th scope="col">Handle</th></tr>
          </thead>
          <tbody>
            <tr><th scope="row">1</th><td>Mark</td><td>Otto</td><td>@mdo</td></tr>
            <tr><th scope="row">2</th><td>Jacob</td><td>Thornton</td><td>@fat</td></tr>
            <tr><th scope="row">3</th><td colspan="2">Larry the Bird</td><td>@twitter</td></tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header"><strong>Table</strong> <small>Dark table</small></div>
      <div class="card-body">
        <table class="table table-dark">
          <thead>
            <tr><th scope="col">#</th><th scope="col">First</th><th scope="col">Last</th><th scope="col">Handle</th></tr>
          </thead>
          <tbody>
            <tr><th scope="row">1</th><td>Mark</td><td>Otto</td><td>@mdo</td></tr>
            <tr><th scope="row">2</th><td>Jacob</td><td>Thornton</td><td>@fat</td></tr>
            <tr><th scope="row">3</th><td colspan="2">Larry the Bird</td><td>@twitter</td></tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header"><strong>Table</strong> <small>Responsive</small></div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr><th scope="col">#</th><th scope="col">Heading</th><th scope="col">Heading</th><th scope="col">Heading</th><th scope="col">Heading</th><th scope="col">Heading</th><th scope="col">Heading</th><th scope="col">Heading</th><th scope="col">Heading</th><th scope="col">Heading</th></tr>
            </thead>
            <tbody>
              <tr><th scope="row">1</th><td>Cell</td><td>Cell</td><td>Cell</td><td>Cell</td><td>Cell</td><td>Cell</td><td>Cell</td><td>Cell</td><td>Cell</td></tr>
              <tr><th scope="row">2</th><td>Cell</td><td>Cell</td><td>Cell</td><td>Cell</td><td>Cell</td><td>Cell</td><td>Cell</td><td>Cell</td><td>Cell</td></tr>
              <tr><th scope="row">3</th><td>Cell</td><td>Cell</td><td>Cell</td><td>Cell</td><td>Cell</td><td>Cell</td><td>Cell</td><td>Cell</td><td>Cell</td></tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
