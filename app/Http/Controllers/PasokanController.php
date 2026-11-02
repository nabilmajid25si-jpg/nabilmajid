<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Halaman GUEST (publik) - menampilkan data dari KEDUA CRUD.
 */
class PasokanController extends Controller
{
    public function index(Request $request)
    {
        $supplierId = $request->query('supplier');

        // [QUERY BUILDER] data Supplier (CRUD 2) + jumlah & total qty pembelian yang sudah diterima (leftJoin)
        $data['suppliers'] = DB::table('suppliers')
            ->leftJoin('purchases', function ($join) {
                $join->on('purchases.supplier_id', '=', 'suppliers.id')
                     ->where('purchases.status', '=', 'Received');
            })
            ->select(
                'suppliers.id', 'suppliers.name', 'suppliers.phone', 'suppliers.address',
                DB::raw('COUNT(purchases.id) as purchases_count'),
                DB::raw('COALESCE(SUM(purchases.quantity), 0) as total_qty')
            )
            ->groupBy('suppliers.id', 'suppliers.name', 'suppliers.phone', 'suppliers.address')
            ->orderBy('suppliers.name')
            ->get();

        // [ELOQUENT] data Pembelian (CRUD 1) + relasi supplier & product, difilter per supplier
        $data['purchases'] = Purchase::with(['supplier', 'product'])
            ->received()
            ->when($supplierId, fn ($q) => $q->where('supplier_id', $supplierId))
            ->latest('purchase_date')
            ->latest('id')
            ->paginate(6)
            ->withQueryString();

        $data['activeSupplier'] = $supplierId ? (string) $supplierId : null;

        return view('guest.pasokan.index', $data);
    }
}
