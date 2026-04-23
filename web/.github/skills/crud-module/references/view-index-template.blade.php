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

  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <span class="fw-semibold">Resources</span>
      <a href="{{ route('resource.create') }}" class="btn btn-sm btn-primary">+ Add Resource</a>
    </div>
    <div class="card-body p-0">
      <table class="table table-hover mb-0 border-top">
        <thead class="table-light">
          <tr>
            <th class="px-3">Name</th>
            <th>Status</th>
            <th class="text-end px-3">Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($items as $item)
            <tr>
              <td class="px-3">{{ $item->name }}</td>
              <td>
                @if ($item->is_active)
                  <span class="badge bg-success">Active</span>
                @else
                  <span class="badge bg-secondary">Inactive</span>
                @endif
              </td>
              <td class="text-end px-3">
                <a href="{{ route('resource.edit', $item) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                <form method="POST" action="{{ route('resource.deactivate', $item) }}" class="d-inline">
                  @csrf
                  <button type="submit"
                    class="btn btn-sm {{ $item->is_active ? 'btn-outline-warning' : 'btn-outline-success' }}">
                    {{ $item->is_active ? 'Deactivate' : 'Activate' }}
                  </button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="3" class="text-center text-body-secondary py-4">No resources found.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
    @if ($items->hasPages())
      <div class="card-footer">
        {{ $items->links() }}
      </div>
    @endif
  </div>
@endsection
