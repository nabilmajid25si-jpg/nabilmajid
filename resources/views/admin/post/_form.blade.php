{{-- Partial form Post (dipakai create & edit). Variabel: $dataCategory, $dataPost (opsional) --}}
@php $post = $dataPost ?? null; @endphp
<div class="row">
    <div class="col-lg-8">
        <div class="mb-3">
            <label for="title" class="form-label">Judul Post</label>
            <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $post->title ?? '') }}">
            @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
    </div>
    <div class="col-lg-4 col-sm-6">
        <div class="mb-3">
            <label for="category_id" class="form-label">Kategori</label>
            <select id="category_id" name="category_id" class="form-select @error('category_id') is-invalid @enderror">
                <option value="">-- Pilih --</option>
                @foreach ($dataCategory as $cat)
                    <option value="{{ $cat->id }}" @selected(old('category_id', $post->category_id ?? '') == $cat->id)>{{ $cat->name }}</option>
                @endforeach
            </select>
            @error('category_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
    </div>
    <div class="col-lg-12">
        <div class="mb-3">
            <label for="content" class="form-label">Isi</label>
            <textarea id="content" name="content" rows="6" class="form-control @error('content') is-invalid @enderror">{{ old('content', $post->content ?? '') }}</textarea>
            @error('content')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
    </div>
    <div class="col-lg-4 col-sm-6">
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select id="status" name="status" class="form-select @error('status') is-invalid @enderror">
                <option value="">-- Pilih --</option>
                <option value="Published" @selected(old('status', $post->status ?? '') == 'Published')>Published</option>
                <option value="Draft" @selected(old('status', $post->status ?? '') == 'Draft')>Draft</option>
            </select>
            @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
    </div>
</div>
<div class="mt-2">
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('post.index') }}" class="btn btn-outline-secondary ms-2">Batal</a>
</div>
