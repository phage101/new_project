@extends('layouts.app')

@section('content')
  <div class="card">
    <div class="card-header">Modals</div>
    <div class="card-body">
      <p class="text-body-secondary">Use this pattern for confirmation dialogs and short forms.</p>
      <button class="btn btn-primary" data-coreui-toggle="modal" data-coreui-target="#demoModal">Open Modal</button>
    </div>
  </div>

  <div class="modal fade" id="demoModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Confirm Action</h5>
          <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Do you want to continue with this operation?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary">Confirm</button>
        </div>
      </div>
    </div>
  </div>
@endsection
