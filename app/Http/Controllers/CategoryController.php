<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

/**
 * CRUD 2 - CATEGORY => menggunakan QUERY BUILDER (DB::table), TANPA Model Eloquent.
 */
class CategoryController extends Controller
{
    // READ (list) - Query Builder: leftJoin + groupBy + nested where + paginate
    public function index(Request $request)
    {
        $q = $request->query('q');

        $data['dataCategory'] = DB::table('categories')
            ->leftJoin('posts', 'posts.category_id', '=', 'categories.id')
            ->select('categories.*', DB::raw('COUNT(posts.id) as posts_count'))
            ->when($q, function ($query) use ($q) {
                // nested where: WHERE (categories.name LIKE ? OR categories.slug LIKE ?)
                $query->where(function ($sub) use ($q) {
                    $sub->where('categories.name', 'like', "%{$q}%")
                        ->orWhere('categories.slug', 'like', "%{$q}%");
                });
            })
            ->groupBy('categories.id', 'categories.name', 'categories.slug', 'categories.description', 'categories.created_at', 'categories.updated_at')
            ->orderBy('categories.name')
            ->paginate(10)
            ->withQueryString();
        $data['q'] = $q;

        return view('admin.category.index', $data);
    }

    public function create()
    {
        return view('admin.category.create');
    }

    // CREATE - Query Builder: DB::table()->insert()
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100|unique:categories,name',
            'description' => 'nullable|string|max:500',
        ]);

        DB::table('categories')->insert([
            'name' => $data['name'],
            'slug' => $this->uniqueSlug($data['name']),
            'description' => $data['description'] ?? null,
            'created_at' => now(),   // Query Builder tidak mengisi timestamps otomatis
            'updated_at' => now(),
        ]);

        return redirect()->route('category.index')->with('success', 'Penambahan Data Berhasil!');
    }

    public function show(string $id)
    {
        return redirect()->route('category.edit', $id);
    }

    // READ (single) - Query Builder: DB::table()->where()->first()
    public function edit(string $id)
    {
        $category = DB::table('categories')->where('id', $id)->first();
        abort_if(is_null($category), 404);

        $data['dataCategory'] = $category;
        return view('admin.category.edit', $data);
    }

    // UPDATE - Query Builder: DB::table()->where()->update()
    public function update(Request $request, string $id)
    {
        $category = DB::table('categories')->where('id', $id)->first();
        abort_if(is_null($category), 404);

        $data = $request->validate([
            'name' => "required|string|max:100|unique:categories,name,{$id}",
            'description' => 'nullable|string|max:500',
        ]);

        $values = [
            'name' => $data['name'],
            'description' => $data['description'] ?? null,
            'updated_at' => now(),
        ];

        if ($category->name !== $data['name']) {
            $values['slug'] = $this->uniqueSlug($data['name'], (int) $id);
        }

        DB::table('categories')->where('id', $id)->update($values);

        return redirect()->route('category.index')->with('success', 'Perubahan Data Berhasil!');
    }

    // DELETE - Query Builder: DB::table()->where()->delete()
    public function destroy(string $id)
    {
        $deleted = DB::table('categories')->where('id', $id)->delete();
        abort_if($deleted === 0, 404);

        return redirect()->route('category.index')->with('success', 'Data Berhasil Dihapus!');
    }

    private function uniqueSlug(string $name, ?int $ignoreId = null): string
    {
        $base = Str::slug($name) ?: 'kategori';
        $slug = $base;
        $i = 2;

        while (DB::table('categories')
            ->where('slug', $slug)
            ->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))
            ->exists()) {
            $slug = $base.'-'.$i++;
        }

        return $slug;
    }
}
