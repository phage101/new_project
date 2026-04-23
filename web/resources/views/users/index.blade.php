@extends('layouts.app')

@section('content')
  @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-coreui-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif
  @if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ session('error') }}
      <button type="button" class="btn-close" data-coreui-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  <!-- General Filter Card -->
  <div class="card mb-3">
    <div class="card-header fw-semibold">Filter Users</div>
    <div class="card-body">
      <div class="row g-2 align-items-end">
        <div class="col-sm-4">
          <label class="form-label small mb-1" for="filterStatus">Status</label>
          <select id="filterStatus" class="form-select form-select-sm">
            <option value="">All Statuses</option>
            <option value="Active">Active</option>
            <option value="Inactive">Inactive</option>
          </select>
        </div>
        <div class="col-sm-3">
          <div class="form-check mt-sm-4">
            <input class="form-check-input" type="checkbox" id="showDeleted">
            <label class="form-check-label small" for="showDeleted">
              Show Deleted
            </label>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <span class="fw-semibold">Users</span>
      <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary">+ Add User</a>
    </div>
    <div class="card-body p-0">
      <table id="usersTable" class="table table-hover mb-0 border-top">
        <thead class="table-light">
          <tr>
            <th class="px-3">Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th>Trash</th>
            <th class="text-end px-3">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($users as $user)
            <tr style="cursor: pointer" onclick="if(!event.target.closest('button') && !event.target.closest('a')) window.location='{{ route('users.edit', $user) }}'">
              <td class="px-3">{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
              <td>{{ $user->roles->pluck('name')->join(', ') ?: '—' }}</td>
              <td>
                @if ($user->is_active)
                  <span class="badge bg-success">Active</span>
                @else
                  <span class="badge bg-secondary">Inactive</span>
                @endif
              </td>
              <td>
                @if ($user->trashed())
                  <span class="badge bg-danger">Deleted</span>
                @else
                  <span class="d-none">ActiveRecord</span>
                @endif
              </td>
              <td class="text-end px-3">
                @if ($user->trashed())
                  <form method="POST" action="{{ route('users.restore', $user->id) }}" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-outline-success">Restore</button>
                  </form>
                @else
                  @if ($user->id !== auth()->id())
                    <form method="POST" action="{{ route('users.deactivate', $user) }}" class="d-inline">
                      @csrf
                      <button type="submit"
                        class="btn btn-sm {{ $user->is_active ? 'btn-outline-warning' : 'btn-outline-success' }}">
                        {{ $user->is_active ? 'Deactivate' : 'Activate' }}
                      </button>
                    </form>
                    <form method="POST" action="{{ route('users.destroy', $user) }}" class="d-inline ms-1">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this user?');">Delete</button>
                    </form>
                  @endif
                @endif
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  @push('scripts')
    <script type="module">
      import DataTable from 'datatables.net-bs5';

      document.addEventListener('DOMContentLoaded', function () {
        const table = new DataTable('#usersTable', {
          pageLength: 50,
          order: [[0, 'asc']],
          columnDefs: [
            { defaultContent: "", targets: "_all" },
            { orderable: false, targets: 5 }
          ]
        });

        // Filter by Status (Column index 3)
        document.getElementById('filterStatus').addEventListener('change', function () {
          table.column(3).search(this.value).draw();
        });

        // Show/Hide Deleted (Column index 4)
        const showDeletedCheckbox = document.getElementById('showDeleted');
        
        function applyDeletedFilter() {
          if (showDeletedCheckbox.checked) {
            table.column(4).search('').draw(); // Show all
          } else {
            table.column(4).search('ActiveRecord').draw(); // Show only non-deleted
          }
        }

        showDeletedCheckbox.addEventListener('change', applyDeletedFilter);
        
        // Initial setup for deleted filter
        applyDeletedFilter();
      });
    </script>
  @endpush
@endsection
