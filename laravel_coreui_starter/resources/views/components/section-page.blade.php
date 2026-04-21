<div class="card">
  <div class="card-header">{{ $title }}</div>
  <div class="card-body">
    <p class="text-body-secondary mb-3">{{ $description }}</p>

    <div class="row g-3">
      <div class="col-md-4">
        <div class="border rounded p-3 h-100">
          <div class="text-uppercase small text-body-secondary mb-1">Section</div>
          <div class="fw-semibold">{{ ucfirst($section) }}</div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="border rounded p-3 h-100">
          <div class="text-uppercase small text-body-secondary mb-1">Status</div>
          <div class="fw-semibold text-success">Wired and Ready</div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="border rounded p-3 h-100">
          <div class="text-uppercase small text-body-secondary mb-1">Next Step</div>
          <div class="fw-semibold">Attach real data</div>
        </div>
      </div>
    </div>
  </div>
</div>
