{{-- PARTIAL: satu kartu pembelian stok.
     SUMBER DATA: ELOQUENT (CRUD 1) -> $purchase = App\Models\Purchase, relasi ->supplier & ->product (belongsTo).
     Param: $purchase --}}
<div class="col-md-6" data-aos="fade-up">
  <article class="card h-100 border-0 shadow-sm">
    <div class="card-body">
      <a href="{{ route('pasokan.index', ['supplier' => $purchase->supplier_id]) }}" class="badge bg-primary text-decoration-none mb-2">
        {{ $purchase->supplier->name ?? 'Supplier dihapus' }}
      </a>
      <h5 class="card-title mb-1">{{ $purchase->product->name ?? 'Produk tidak ditemukan' }}</h5>
      @if ($purchase->product)<p class="text-muted small mb-3">SKU: {{ $purchase->product->sku }}</p>@endif
      <div class="d-flex justify-content-between">
        <span><i class="bi bi-box me-1"></i>{{ $purchase->quantity }} unit</span>
        <span>Rp {{ number_format((float) $purchase->unit_cost, 0, ',', '.') }}/unit</span>
      </div>
      <hr>
      <small class="text-muted"><i class="bi bi-calendar3 me-1"></i>Diterima {{ $purchase->purchase_date->format('d M Y') }}</small>
    </div>
  </article>
</div>
