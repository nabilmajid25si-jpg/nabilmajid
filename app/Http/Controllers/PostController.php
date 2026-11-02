<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

/**
 * CRUD 1 - POST  => menggunakan ELOQUENT ORM (Model Post).
 */
class PostController extends Controller
{
    // READ (list) - Eloquent + eager loading relasi + search dengan nested where
    public function index(Request $request)
    {
        $q = $request->query('q');

        $data['dataPost'] = Post::with('category')                // eager load relasi belongsTo
            ->when($q, function ($query) use ($q) {
                // nested where: WHERE (title LIKE ? OR content LIKE ?)
                $query->where(function ($sub) use ($q) {
                    $sub->where('title', 'like', "%{$q}%")
                        ->orWhere('content', 'like', "%{$q}%");
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();
        $data['q'] = $q;

        return view('admin.post.index', $data);
    }

    public function create()
    {
        $data['dataCategory'] = Category::orderBy('name')->get();
        return view('admin.post.create', $data);
    }

    // CREATE - Eloquent: Model::create()
    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['slug'] = $this->uniqueSlug($data['title']);

        Post::create($data);

        return redirect()->route('post.index')->with('success', 'Penambahan Data Berhasil!');
    }

    public function show(string $id)
    {
        return redirect()->route('post.edit', $id);
    }

    public function edit(string $id)
    {
        $data['dataPost'] = Post::findOrFail($id);
        $data['dataCategory'] = Category::orderBy('name')->get();
        return view('admin.post.edit', $data);
    }

    // UPDATE - Eloquent: findOrFail()->update()
    public function update(Request $request, string $id)
    {
        $post = Post::findOrFail($id);
        $data = $this->validated($request);

        if ($post->title !== $data['title']) {
            $data['slug'] = $this->uniqueSlug($data['title'], $post->id);
        }

        $post->update($data);

        return redirect()->route('post.index')->with('success', 'Perubahan Data Berhasil!');
    }

    // DELETE - Eloquent: findOrFail()->delete()
    public function destroy(string $id)
    {
        Post::findOrFail($id)->delete();

        return redirect()->route('post.index')->with('success', 'Data Berhasil Dihapus!');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:200',
            'content' => 'required|string',
            'status' => 'required|in:Published,Draft',
        ]);
    }

    private function uniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $base = Str::slug($title) ?: 'post';
        $slug = $base;
        $i = 2;

        while (Post::where('slug', $slug)->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))->exists()) {
            $slug = $base.'-'.$i++;
        }

        return $slug;
    }
}
