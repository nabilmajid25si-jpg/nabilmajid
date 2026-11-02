<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * CRUD 2 - SUPPLIER => menggunakan QUERY BUILDER (DB::table), TANPA Model Eloquent.
 */
class SupplierController extends Controller
{
    // READ (list) - Query Builder: leftJoin + agregat + groupBy + nested where + paginate
    public function index(Request $request)
    {
        $q = $request->query('q');

        $data['dataSupplier'] = DB::table('suppliers')
            ->leftJoin('purchases', 'purchases.supplier_id', '=', 'suppliers.id')
            ->select(
                'suppliers.*',
                DB::raw('COUNT(purchases.id) as purchases_count'),
                DB::raw('COALESCE(SUM(purchases.quantity), 0) as total_qty')
            )
            ->when($q, function ($query) use ($q) {
                // nested where: WHERE (suppliers.name LIKE ? OR suppliers.phone LIKE ? OR suppliers.email LIKE ?)
                $query->where(function ($sub) use ($q) {
                    $sub->where('suppliers.name', 'like', "%{$q}%")
                        ->orWhere('suppliers.phone', 'like', "%{$q}%")
                        ->orWhere('suppliers.email', 'like', "%{$q}%");
                });
            })
            ->groupBy('suppliers.id', 'suppliers.name', 'suppliers.phone', 'suppliers.email', 'suppliers.address', 'suppliers.created_at', 'suppliers.updated_at')
            ->orderBy('suppliers.name')
            ->paginate(10)
            ->withQueryString();
        $data['q'] = $q;

        return view('admin.supplier.index', $data);
    }

    public function create()
    {
        return view('admin.supplier.create');
    }

    // CREATE - Query Builder: DB::table()->insert()
    public function store(Request $request)
    {
        $data = $this->validated($request);

        DB::table('suppliers')->insert($data + [
            'created_at' => now(),   // Query Builder tidak mengisi timestamps otomatis
            'updated_at' => now(),
        ]);

        return redirect()->route('supplier.index')->with('success', 'Penambahan Data Berhasil!');
    }

    public function show(string $id)
    {
        return redirect()->route('supplier.edit', $id);
    }

    // READ (single) - Query Builder: DB::table()->where()->first()
    public function edit(string $id)
    {
        $supplier = DB::table('suppliers')->where('id', $id)->first();
        abort_if(is_null($supplier), 404);

        $data['dataSupplier'] = $supplier;
        return view('admin.supplier.edit', $data);
    }

    // UPDATE - Query Builder: DB::table()->where()->update()
    public function update(Request $request, string $id)
    {
        abort_unless(DB::table('suppliers')->where('id', $id)->exists(), 404);

        $data = $this->validated($request);

        DB::table('suppliers')->where('id', $id)->update($data + ['updated_at' => now()]);

        return redirect()->route('supplier.index')->with('success', 'Perubahan Data Berhasil!');
    }

    // DELETE - Query Builder: DB::table()->where()->delete()
    public function destroy(string $id)
    {
        // Supplier yang sudah punya data pembelian tidak boleh dihapus.
        if (DB::table('purchases')->where('supplier_id', $id)->exists()) {
            return redirect()->route('supplier.index')
                ->with('error', 'Supplier tidak bisa dihapus karena masih memiliki data pembelian.');
        }

        $deleted = DB::table('suppliers')->where('id', $id)->delete();
        abort_if($deleted === 0, 404);

        return redirect()->route('supplier.index')->with('success', 'Data Berhasil Dihapus!');
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'name' => 'required|string|max:150',
            'phone' => 'nullable|string|max:30',
            'email' => 'nullable|email|max:150',
            'address' => 'nullable|string|max:500',
        ]);

        return [
            'name' => $data['name'],
            'phone' => $data['phone'] ?? null,
            'email' => $data['email'] ?? null,
            'address' => $data['address'] ?? null,
        ];
    }
}
