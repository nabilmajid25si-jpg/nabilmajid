{{-- PARTIAL: satu kartu post.
     SUMBER DATA: ELOQUENT (CRUD 1) -> $post adalah instance App\Models\Post, $post->category memakai relasi belongsTo.
     Param: $post --}}
<div class="col-md-6" data-aos="fade-up">
  <article class="card h-100 border-0 shadow-sm">
    <div class="card-body d-flex flex-column">
      @if ($post->category)
        <a href="{{ route('blog.index', ['kategori' => $post->category->slug]) }}" class="badge bg-primary text-decoration-none align-self-start mb-2">
          {{ $post->category->name }}
        </a>
      @else
        <span class="badge bg-secondary align-self-start mb-2">Tanpa Kategori</span>
      @endif
      <h5 class="card-title">
        <a href="{{ route('blog.show', $post->slug) }}" class="text-decoration-none">{{ $post->title }}</a>
      </h5>
      <p class="card-text text-muted flex-grow-1">{{ \Illuminate\Support\Str::limit($post->content, 120) }}</p>
      <div class="d-flex justify-content-between align-items-center">
        <small class="text-muted"><i class="bi bi-calendar3 me-1"></i>{{ $post->created_at->format('d M Y') }}</small>
        <a href="{{ route('blog.show', $post->slug) }}" class="small">Baca selengkapnya &rarr;</a>
      </div>
    </div>
  </article>
</div>
