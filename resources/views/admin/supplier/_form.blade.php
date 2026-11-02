{{-- Partial form Supplier (create & edit). $dataSupplier (opsional) = stdClass dari Query Builder --}}
@php $sup = $dataSupplier ?? null; @endphp
<div class="row">
    <div class="col-lg-6">
        <div class="mb-3">
            <label for="name" class="form-label">Nama Supplier</label>
            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $sup->name ?? '') }}">
            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="mb-3">
            <label for="phone" class="form-label">Telepon</label>
            <input type="text" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', $sup->phone ?? '') }}">
            @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $sup->email ?? '') }}">
            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
    </div>
    <div class="col-12">
        <div class="mb-3">
            <label for="address" class="form-label">Alamat</label>
            <textarea id="address" name="address" rows="3" class="form-control @error('address') is-invalid @enderror">{{ old('address', $sup->address ?? '') }}</textarea>
            @error('address')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
    </div>
</div>
<div class="mt-2">
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('supplier.index') }}" class="btn btn-outline-secondary ms-2">Batal</a>
</div>
