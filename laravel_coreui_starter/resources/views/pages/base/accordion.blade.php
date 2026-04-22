@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header"><strong>Accordion</strong></div>
      <div class="card-body">
        <p class="text-body-secondary small">Click the accordions below to expand/collapse the accordion content.</p>
        <div class="accordion" id="accordion1">
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button" type="button" data-coreui-toggle="collapse" data-coreui-target="#collapse1">
                Accordion Item #1
              </button>
            </h2>
            <div id="collapse1" class="accordion-collapse collapse show" data-coreui-parent="#accordion1">
              <div class="accordion-body">
                <strong>This is the first item's accordion body.</strong> It is shown by default.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-coreui-toggle="collapse" data-coreui-target="#collapse2">
                Accordion Item #2
              </button>
            </h2>
            <div id="collapse2" class="accordion-collapse collapse" data-coreui-parent="#accordion1">
              <div class="accordion-body">
                <strong>This is the second item's accordion body.</strong> It is hidden by default.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-coreui-toggle="collapse" data-coreui-target="#collapse3">
                Accordion Item #3
              </button>
            </h2>
            <div id="collapse3" class="accordion-collapse collapse" data-coreui-parent="#accordion1">
              <div class="accordion-body">
                <strong>This is the third item's accordion body.</strong> It is hidden by default.
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header"><strong>Accordion</strong> <small>Flush</small></div>
      <div class="card-body">
        <p class="text-body-secondary small">Add <code>flush</code> to remove borders and rounded corners.</p>
        <div class="accordion accordion-flush" id="accordionFlush">
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-coreui-toggle="collapse" data-coreui-target="#flushCollapse1">
                Accordion Item #1
              </button>
            </h2>
            <div id="flushCollapse1" class="accordion-collapse collapse" data-coreui-parent="#accordionFlush">
              <div class="accordion-body">Placeholder content for this accordion.</div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-coreui-toggle="collapse" data-coreui-target="#flushCollapse2">
                Accordion Item #2
              </button>
            </h2>
            <div id="flushCollapse2" class="accordion-collapse collapse" data-coreui-parent="#accordionFlush">
              <div class="accordion-body">Placeholder content for this accordion.</div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-coreui-toggle="collapse" data-coreui-target="#flushCollapse3">
                Accordion Item #3
              </button>
            </h2>
            <div id="flushCollapse3" class="accordion-collapse collapse" data-coreui-parent="#accordionFlush">
              <div class="accordion-body">Placeholder content for this accordion.</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header"><strong>Accordion</strong> <small>Always open</small></div>
      <div class="card-body">
        <p class="text-body-secondary small">Omit <code>data-coreui-parent</code> to make accordion items stay open when another item is opened.</p>
        <div class="accordion" id="accordionAlways">
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button" type="button" data-coreui-toggle="collapse" data-coreui-target="#always1">
                Accordion Item #1
              </button>
            </h2>
            <div id="always1" class="accordion-collapse collapse show">
              <div class="accordion-body"><strong>This is the first item's accordion body.</strong></div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-coreui-toggle="collapse" data-coreui-target="#always2">
                Accordion Item #2
              </button>
            </h2>
            <div id="always2" class="accordion-collapse collapse">
              <div class="accordion-body"><strong>This is the second item's accordion body.</strong></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
