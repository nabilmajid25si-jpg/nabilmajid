{{-- Partial form Pembelian (create & edit). Variabel: $dataSupplier, $dataProduct, $dataPurchase (opsional) --}}
@php $pur = $dataPurchase ?? null; @endphp
<div class="row">
    <div class="col-lg-4 col-sm-6">
        <div class="mb-3">
            <label for="supplier_id" class="form-label">Supplier</label>
            <select id="supplier_id" name="supplier_id" class="form-select @error('supplier_id') is-invalid @enderror">
                <option value="">-- Pilih --</option>
                @foreach ($dataSupplier as $s)
                    <option value="{{ $s->id }}" @selected(old('supplier_id', $pur->supplier_id ?? '') == $s->id)>{{ $s->name }}</option>
                @endforeach
            </select>
            @error('supplier_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
            @if ($dataSupplier->isEmpty())<div class="form-text text-danger">Belum ada supplier. Tambahkan dulu di menu Data Supplier.</div>@endif
        </div>
    </div>
    <div class="col-lg-4 col-sm-6">
        <div class="mb-3">
            <label for="product_id" class="form-label">Produk</label>
            <select id="product_id" name="product_id" class="form-select @error('product_id') is-invalid @enderror">
                <option value="">-- Pilih --</option>
                @foreach ($dataProduct as $p)
                    <option value="{{ $p->product_id }}" @selected(old('product_id', $pur->product_id ?? '') == $p->product_id)>{{ $p->name }} ({{ $p->sku }})</option>
                @endforeach
            </select>
            @error('product_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
            @if ($dataProduct->isEmpty())<div class="form-text text-danger">Belum ada produk. Tambahkan dulu di menu Data Product.</div>@endif
        </div>
    </div>
    <div class="col-lg-4 col-sm-6">
        <div class="mb-3">
            <label for="purchase_date" class="form-label">Tanggal Pembelian</label>
            <input type="date" id="purchase_date" name="purchase_date" class="form-control @error('purchase_date') is-invalid @enderror"
                   value="{{ old('purchase_date', optional($pur->purchase_date ?? null)->format('Y-m-d') ?? date('Y-m-d')) }}">
            @error('purchase_date')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
    </div>
    <div class="col-lg-4 col-sm-6">
        <div class="mb-3">
            <label for="quantity" class="form-label">Jumlah (Qty)</label>
            <input type="number" id="quantity" name="quantity" step="1" min="1" class="form-control @error('quantity') is-invalid @enderror" value="{{ old('quantity', $pur->quantity ?? '') }}">
            @error('quantity')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
    </div>
    <div class="col-lg-4 col-sm-6">
        <div class="mb-3">
            <label for="unit_cost" class="form-label">Harga Beli / Unit (Rp)</label>
            <input type="number" id="unit_cost" name="unit_cost" step="0.01" min="0" class="form-control @error('unit_cost') is-invalid @enderror" value="{{ old('unit_cost', $pur->unit_cost ?? '') }}">
            @error('unit_cost')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
    </div>
    <div class="col-lg-4 col-sm-6">
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select id="status" name="status" class="form-select @error('status') is-invalid @enderror">
                <option value="">-- Pilih --</option>
                <option value="Pending" @selected(old('status', $pur->status ?? '') == 'Pending')>Pending</option>
                <option value="Received" @selected(old('status', $pur->status ?? '') == 'Received')>Received</option>
            </select>
            @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
    </div>
</div>
<div class="mt-2">
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('purchase.index') }}" class="btn btn-outline-secondary ms-2">Batal</a>
</div>
