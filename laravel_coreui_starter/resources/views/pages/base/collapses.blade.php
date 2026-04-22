@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header"><strong>Collapse</strong></div>
      <div class="card-body">
        <p class="text-body-secondary small">You can use a link or a button component.</p>
        <a class="btn btn-primary me-1" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Link</a>
        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Button</button>
        <div class="collapse mt-3" id="collapseExample">
          <div class="card card-body">
            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
          </div>
        </div>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header"><strong>Collapse</strong> <small>Horizontal</small></div>
      <div class="card-body">
        <p class="text-body-secondary small">The collapse plugin also supports horizontal collapsing. Add the <code>.collapse-horizontal</code> modifier class to transition the <code>width</code> instead of <code>height</code>.</p>
        <button class="btn btn-primary mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseHorizontal" aria-expanded="false" aria-controls="collapseHorizontal">Toggle horizontal collapse</button>
        <div style="min-height: 120px;">
          <div class="collapse collapse-horizontal" id="collapseHorizontal">
            <div class="card card-body" style="width: 300px;">
              This is some placeholder content for a horizontal collapse. It's hidden by default and shown when triggered.
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header"><strong>Collapse</strong> <small>Multiple targets</small></div>
      <div class="card-body">
        <p class="text-body-secondary small">A <code>&lt;button&gt;</code> or <code>&lt;a&gt;</code> element can show and hide multiple elements by referencing them with a selector in its <code>href</code> or <code>data-bs-target</code> attribute.</p>
        <button class="btn btn-primary me-1" type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseA">Toggle first element</button>
        <button class="btn btn-primary me-1" type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseB">Toggle second element</button>
        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target=".multi-collapse">Toggle both</button>
        <div class="row mt-3">
          <div class="col">
            <div class="collapse multi-collapse" id="multiCollapseA">
              <div class="card card-body">Some placeholder content for the first collapse component of this multi-collapse example.</div>
            </div>
          </div>
          <div class="col">
            <div class="collapse multi-collapse" id="multiCollapseB">
              <div class="card card-body">Some placeholder content for the second collapse component of this multi-collapse example.</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
