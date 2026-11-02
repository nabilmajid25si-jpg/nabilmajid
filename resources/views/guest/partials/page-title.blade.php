{{-- Partial reusable: judul halaman + breadcrumb. Param: $title, $subtitle (opsional), $crumbs (opsional: [label => url|null]) --}}
<div class="page-title light-background">
  <div class="container d-lg-flex justify-content-between align-items-center">
    <div>
      <h1 class="mb-0">{{ $title }}</h1>
      @isset($subtitle)<p class="mb-0 mt-1 text-muted">{{ $subtitle }}</p>@endisset
    </div>
    <nav class="breadcrumbs">
      <ol>
        <li><a href="{{ route('home') }}">Home</a></li>
        @foreach (($crumbs ?? []) as $label => $url)
          @if ($url)
            <li><a href="{{ $url }}">{{ $label }}</a></li>
          @else
            <li class="current">{{ $label }}</li>
          @endif
        @endforeach
      </ol>
    </nav>
  </div>
</div>
