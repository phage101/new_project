@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header"><strong>Tabs</strong></div>
      <div class="card-body">
        <p class="text-body-secondary small">The basic tabs example uses the <code>nav-tabs</code> class to generate a tabbed interface.</p>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="false">Home</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="true">Profile</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Contact</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link disabled" type="button" role="tab" disabled>Disabled</button>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade p-3" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">Home tab content</div>
          <div class="tab-pane fade show active p-3" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">Profile tab content</div>
          <div class="tab-pane fade p-3" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">Contact tab content</div>
        </div>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header"><strong>Tabs</strong> <small>Pills</small></div>
      <div class="card-body">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Home</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</button>
          </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">Home tab content</div>
          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">Profile tab content</div>
          <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">Contact tab content</div>
        </div>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header"><strong>Tabs</strong> <small>Underline</small></div>
      <div class="card-body">
        <ul class="nav nav-underline mb-3">
          <li class="nav-item"><a class="nav-link active" href="#">Active</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Link</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Link</a></li>
          <li class="nav-item"><a class="nav-link disabled">Disabled</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
@endsection
