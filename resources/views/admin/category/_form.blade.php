{{-- Partial form Category (dipakai create & edit). Variabel: $dataCategory (opsional, stdClass dari Query Builder) --}}
@php $cat = $dataCategory ?? null; @endphp
<div class="row">
    <div class="col-lg-6">
        <div class="mb-3">
            <label for="name" class="form-label">Nama Kategori</label>
            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $cat->name ?? '') }}">
            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
    </div>
    <div class="col-lg-12">
        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea id="description" name="description" rows="3" class="form-control @error('description') is-invalid @enderror">{{ old('description', $cat->description ?? '') }}</textarea>
            @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
    </div>
</div>
<div class="mt-2">
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('category.index') }}" class="btn btn-outline-secondary ms-2">Batal</a>
</div>
