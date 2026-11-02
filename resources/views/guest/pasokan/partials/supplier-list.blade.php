{{-- PARTIAL: daftar supplier.
     SUMBER DATA: QUERY BUILDER (CRUD 2) -> $suppliers = Collection<stdClass> dari DB::table('suppliers')->leftJoin(...)
     Param: $suppliers, $activeSupplier --}}
<div class="card border-0 shadow-sm mb-4">
  <div class="card-body">
    <h5 class="card-title mb-3"><i class="bi bi-truck me-2"></i>Supplier</h5>
    <div class="list-group list-group-flush">
      <a href="{{ route('pasokan.index') }}"
         class="list-group-item list-group-item-action {{ $activeSupplier ? '' : 'active' }}">Semua Supplier</a>
      @forelse ($suppliers as $sup)
        <a href="{{ route('pasokan.index', ['supplier' => $sup->id]) }}"
           class="list-group-item list-group-item-action {{ $activeSupplier === (string) $sup->id ? 'active' : '' }}">
          <div class="d-flex justify-content-between align-items-center">
            <span>{{ $sup->name }}</span>
            <span class="badge bg-secondary rounded-pill">{{ $sup->purchases_count }}x</span>
          </div>
          <small class="d-block opacity-75">Total diterima: {{ $sup->total_qty }} unit</small>
        </a>
      @empty
        <span class="list-group-item text-muted">Belum ada supplier.</span>
      @endforelse
    </div>
    <p class="small text-muted mt-3 mb-0"><i class="bi bi-database me-1"></i>Data: Query Builder</p>
  </div>
</div>
