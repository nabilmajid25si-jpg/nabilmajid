<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        // Kategori dibuat dengan Query Builder (selaras dengan CRUD 2).
        $now = now();
        foreach ([
            ['Web Development', 'web-development', 'Artikel seputar pengembangan web.'],
            ['Database', 'database', 'Tips MySQL, SQLite, dan query.'],
            ['Laravel', 'laravel', 'Framework PHP favorit.'],
        ] as [$name, $slug, $desc]) {
            DB::table('categories')->updateOrInsert(
                ['slug' => $slug],
                ['name' => $name, 'description' => $desc, 'created_at' => $now, 'updated_at' => $now]
            );
        }

        $cat = DB::table('categories')->pluck('id', 'slug');

        // Post dibuat dengan Eloquent (selaras dengan CRUD 1).
        foreach ([
            ['web-development', 'Belajar Dasar HTML dan CSS', 'belajar-dasar-html-dan-css', 'HTML membentuk struktur, CSS mengatur tampilan. Mulailah dari elemen paling dasar.', 'Published'],
            ['laravel', 'Mengenal Eloquent ORM', 'mengenal-eloquent-orm', 'Eloquent memetakan tabel ke model sehingga query bisa ditulis secara ekspresif.', 'Published'],
            ['laravel', 'Query Builder vs Eloquent', 'query-builder-vs-eloquent', 'Query Builder cocok untuk query kompleks, Eloquent nyaman untuk relasi antar model.', 'Published'],
            ['database', 'Join dan Left Join Dijelaskan', 'join-dan-left-join-dijelaskan', 'Left join mempertahankan seluruh baris tabel kiri meskipun tidak ada pasangan.', 'Draft'],
        ] as [$slugCat, $title, $slug, $content, $status]) {
            Post::updateOrCreate(
                ['slug' => $slug],
                ['category_id' => $cat[$slugCat], 'title' => $title, 'content' => $content, 'status' => $status]
            );
        }
    }
}
