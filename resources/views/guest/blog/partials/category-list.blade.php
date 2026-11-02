{{-- PARTIAL: daftar kategori.
     SUMBER DATA: QUERY BUILDER (CRUD 2) -> $categories adalah Collection<stdClass> dari DB::table('categories')->leftJoin(...)
     Param: $categories, $activeSlug --}}
<div class="card border-0 shadow-sm mb-4">
  <div class="card-body">
    <h5 class="card-title mb-3"><i class="bi bi-tags me-2"></i>Kategori</h5>
    <div class="list-group list-group-flush">
      <a href="{{ route('blog.index') }}"
         class="list-group-item list-group-item-action d-flex justify-content-between align-items-center {{ $activeSlug ? '' : 'active' }}">
        Semua
      </a>
      @forelse ($categories as $cat)
        <a href="{{ route('blog.index', ['kategori' => $cat->slug]) }}"
           class="list-group-item list-group-item-action d-flex justify-content-between align-items-center {{ $activeSlug === $cat->slug ? 'active' : '' }}"
           @if ($cat->description) title="{{ $cat->description }}" @endif>
          {{ $cat->name }}
          <span class="badge bg-secondary rounded-pill">{{ $cat->posts_count }}</span>
        </a>
      @empty
        <span class="list-group-item text-muted">Belum ada kategori.</span>
      @endforelse
    </div>
    <p class="small text-muted mt-3 mb-0"><i class="bi bi-database me-1"></i>Data: Query Builder</p>
  </div>
</div>
