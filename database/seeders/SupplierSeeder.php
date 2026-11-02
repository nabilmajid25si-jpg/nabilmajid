<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    public function run(): void
    {
        // Supplier dibuat dengan Query Builder (selaras dengan CRUD 2).
        $now = now();
        foreach ([
            ['PT Maju Jaya Sentosa', '021-5551001', 'sales@majujaya.test', 'Jl. Merdeka No. 10, Jakarta'],
            ['CV Sumber Makmur', '022-5552002', 'info@sumbermakmur.test', 'Jl. Asia Afrika No. 5, Bandung'],
            ['UD Berkah Abadi', '031-5553003', 'order@berkahabadi.test', 'Jl. Pemuda No. 21, Surabaya'],
        ] as [$name, $phone, $email, $address]) {
            DB::table('suppliers')->updateOrInsert(
                ['name' => $name],
                ['phone' => $phone, 'email' => $email, 'address' => $address, 'created_at' => $now, 'updated_at' => $now]
            );
        }

        // Pembelian dibuat dengan Eloquent (selaras dengan CRUD 1) - hanya jika sudah ada data Product.
        $products = Product::take(3)->get();
        $supplierIds = DB::table('suppliers')->orderBy('id')->pluck('id');

        foreach ($products as $i => $product) {
            Purchase::firstOrCreate(
                ['supplier_id' => $supplierIds[$i % $supplierIds->count()], 'product_id' => $product->product_id, 'purchase_date' => now()->subDays($i + 1)->toDateString()],
                ['quantity' => 20 + $i * 10, 'unit_cost' => (float) $product->price * 0.7, 'status' => $i === 2 ? 'Pending' : 'Received']
            );
        }
    }
}
