<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Halaman GUEST (publik) - menampilkan data dari KEDUA CRUD.
 */
class BlogController extends Controller
{
    public function index(Request $request)
    {
        $slug = $request->query('kategori');

        // [QUERY BUILDER] data Category (CRUD 2) + jumlah post yang sudah terbit (leftJoin)
        $data['categories'] = DB::table('categories')
            ->leftJoin('posts', function ($join) {
                $join->on('posts.category_id', '=', 'categories.id')
                     ->where('posts.status', '=', 'Published');
            })
            ->select('categories.id', 'categories.name', 'categories.slug', 'categories.description', DB::raw('COUNT(posts.id) as posts_count'))
            ->groupBy('categories.id', 'categories.name', 'categories.slug', 'categories.description')
            ->orderBy('categories.name')
            ->get();

        // [ELOQUENT] data Post (CRUD 1) + relasi category, difilter per kategori (whereHas)
        $data['posts'] = Post::with('category')
            ->published()
            ->when($slug, fn ($q) => $q->whereHas('category', fn ($c) => $c->where('slug', $slug)))
            ->latest()
            ->paginate(6)
            ->withQueryString();

        $data['activeSlug'] = $slug;

        return view('guest.blog.index', $data);
    }

    // [ELOQUENT] route model binding berdasarkan slug
    public function show(Post $post)
    {
        abort_unless($post->status === 'Published', 404);

        $data['post'] = $post->load('category');
        return view('guest.blog.show', $data);
    }
}
