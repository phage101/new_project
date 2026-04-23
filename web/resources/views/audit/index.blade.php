@extends('layouts.app')

@section('content')
  <!-- General Filter Card -->
  <div class="card mb-3">
    <div class="card-header fw-semibold">Filter Audit Trail</div>
    <div class="card-body">
      <div class="row g-2 align-items-end">
        <div class="col-sm-4">
          <label class="form-label small mb-1" for="filterAction">Action</label>
          <select id="filterAction" class="form-select form-select-sm">
            <option value="">All actions</option>
            @foreach ($actions as $act)
              <option value="{{ $act }}">{{ $act }}</option>
            @endforeach
          </select>
        </div>
        <div class="col-sm-3">
          <label class="form-label small mb-1" for="filterUser">User</label>
          <select id="filterUser" class="form-select form-select-sm">
            <option value="">All users</option>
            @foreach ($users as $u)
              <option value="{{ $u->name }}">{{ $u->name }} (#{{ $u->id }})</option>
            @endforeach
          </select>
        </div>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <span class="fw-semibold">Audit Trail</span>
      <span class="text-body-secondary small">{{ number_format($logs->count()) }} entries</span>
    </div>
    <div class="card-body p-0">
      <div class="table-responsive">
        <table id="auditTable" class="table table-hover table-sm mb-0 border-top">
          <thead class="table-light">
            <tr>
              <th class="px-3" style="width:160px">Time</th>
              <th>User</th>
              <th>Action</th>
              <th>Target</th>
              <th class="px-3">IP</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($logs as $log)
              <tr>
                <td class="px-3 text-body-secondary small text-nowrap" data-order="{{ $log->created_at->timestamp }}">
                  {{ $log->created_at->format('Y-m-d H:i:s') }}
                </td>
                <td>
                  @if ($log->user)
                    {{ $log->user->name }}
                    <span class="text-body-secondary small d-none">(#{{ $log->user_id }})</span>
                  @else
                    <span class="text-body-secondary">—</span>
                  @endif
                </td>
                <td><code class="small">{{ $log->action }}</code></td>
                <td class="text-body-secondary small">
                  @if ($log->model_type && $log->model_id)
                    {{ class_basename($log->model_type) }} #{{ $log->model_id }}
                  @else
                    —
                  @endif
                </td>
                <td class="px-3 text-body-secondary small">{{ $log->ip_address ?? '—' }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

  @push('scripts')
    <script type="module">
      import DataTable from 'datatables.net-bs5';

      document.addEventListener('DOMContentLoaded', function () {
        const table = new DataTable('#auditTable', {
          pageLength: 50,
          order: [[0, 'desc']],
          columnDefs: [
            { defaultContent: "", targets: "_all" }
          ]
        });

        // Filter by Action (Column index 2)
        document.getElementById('filterAction').addEventListener('change', function () {
          table.column(2).search(this.value).draw();
        });

        // Filter by User (Column index 1)
        document.getElementById('filterUser').addEventListener('change', function () {
          table.column(1).search(this.value).draw();
        });
      });
    </script>
  @endpush
@endsection
