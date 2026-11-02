@extends('layouts.guest.app')

@section('title', 'Pasokan Stok')

@section('content')
  {{-- Partial: judul halaman --}}
  @include('guest.partials.page-title', [
      'title' => 'Pasokan Stok',
      'subtitle' => 'Data dari 2 CRUD: Pembelian (Eloquent) & Supplier (Query Builder)',
      'crumbs' => ['Pasokan' => null],
  ])

  <section class="section">
    <div class="container">
      <div class="row gy-4">

        {{-- Kiri: daftar Pembelian (Eloquent) --}}
        <div class="col-lg-8">
          <div class="row gy-4">
            @forelse ($purchases as $purchase)
              {{-- Partial: kartu pembelian --}}
              @include('guest.pasokan.partials.purchase-card', ['purchase' => $purchase])
            @empty
              <div class="col-12"><div class="alert alert-info mb-0">Belum ada pembelian yang diterima.</div></div>
            @endforelse
          </div>

          <div class="mt-4">{{ $purchases->links() }}</div>
          <p class="small text-muted mt-2 mb-0"><i class="bi bi-database me-1"></i>Data: Eloquent ORM</p>
        </div>

        {{-- Kanan: daftar Supplier (Query Builder) --}}
        <aside class="col-lg-4">
          {{-- Partial: daftar supplier --}}
          @include('guest.pasokan.partials.supplier-list', ['suppliers' => $suppliers, 'activeSupplier' => $activeSupplier])
        </aside>

      </div>
    </div>
  </section>
@endsection
