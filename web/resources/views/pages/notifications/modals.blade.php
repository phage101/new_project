@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header"><strong>Modal</strong> <small>Live demo</small></div>
      <div class="card-body">
        <p class="text-body-secondary small">Toggle a working modal demo by clicking the button below.</p>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#liveModal">Launch demo modal</button>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header"><strong>Modal</strong> <small>Static backdrop</small></div>
      <div class="card-body">
        <p class="text-body-secondary small">When backdrop is set to static, the modal will not close when clicking outside of it.</p>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticModal">Launch static backdrop modal</button>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header"><strong>Modal</strong> <small>Sizing</small></div>
      <div class="card-body">
        <p class="text-body-secondary small">Modals have three optional sizes.</p>
        <button type="button" class="btn btn-primary me-1" data-bs-toggle="modal" data-bs-target="#largeModal">Large modal</button>
        <button type="button" class="btn btn-secondary me-1" data-bs-toggle="modal" data-bs-target="#smallModal">Small modal</button>
        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#xlModal">Extra large</button>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header"><strong>Modal</strong> <small>Scrolling long content</small></div>
      <div class="card-body">
        <button type="button" class="btn btn-primary me-1" data-bs-toggle="modal" data-bs-target="#scrollModal">Launch scrollable modal</button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#scrollDialogModal">Scrollable dialog modal</button>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header"><strong>Modal</strong> <small>Vertically centered</small></div>
      <div class="card-body">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#centeredModal">Vertically centered modal</button>
      </div>
    </div>
  </div>
</div>

{{-- Live Demo Modal --}}
<div class="modal fade" id="liveModal" tabindex="-1" aria-labelledby="liveModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="liveModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">Woohoo, you're reading this text in a modal!</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

{{-- Static Backdrop Modal --}}
<div class="modal fade" id="staticModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">I will not close if you click outside me. Don't even try to press escape key.</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

{{-- Large Modal --}}
<div class="modal fade" id="largeModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header"><h5 class="modal-title">Large modal</h5><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
      <div class="modal-body">This is a large modal body content area.</div>
      <div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button></div>
    </div>
  </div>
</div>

{{-- Small Modal --}}
<div class="modal fade" id="smallModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header"><h5 class="modal-title">Small modal</h5><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
      <div class="modal-body">This is a small modal body content area.</div>
      <div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button></div>
    </div>
  </div>
</div>

{{-- XL Modal --}}
<div class="modal fade" id="xlModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header"><h5 class="modal-title">Extra large modal</h5><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
      <div class="modal-body">This is an extra large modal body content area.</div>
      <div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button></div>
    </div>
  </div>
</div>

{{-- Scrollable Modal --}}
<div class="modal fade" id="scrollModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header"><h5 class="modal-title">Scrollable modal</h5><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
      <div class="modal-body"><p>This is some placeholder content to show the scrolling behavior for modals. Instead of repeating the text the modal, we use an inline style set a minimum height, thereby extending the length of the overall modal and demonstrating the overflow scrolling.</p><p>Just like that.</p><p>Keep going to see the scrollbar behavior!</p></div>
      <div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button><button type="button" class="btn btn-primary">Save changes</button></div>
    </div>
  </div>
</div>

{{-- Scrollable Dialog Modal --}}
<div class="modal fade" id="scrollDialogModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header"><h5 class="modal-title">Scrollable dialog modal</h5><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
      <div class="modal-body" style="max-height: 300px; overflow-y: auto;"><p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p><p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</p></div>
      <div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button><button type="button" class="btn btn-primary">Save changes</button></div>
    </div>
  </div>
</div>

{{-- Vertically Centered Modal --}}
<div class="modal fade" id="centeredModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header"><h5 class="modal-title">Vertically centered modal</h5><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
      <div class="modal-body">This is a vertically centered modal.</div>
      <div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button><button type="button" class="btn btn-primary">Save changes</button></div>
    </div>
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
