<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Purchase;
use App\Models\Supplier;
use Illuminate\Http\Request;

/**
 * CRUD 1 - PEMBELIAN STOK (Purchase) => menggunakan ELOQUENT ORM.
 * Relasi: Purchase belongsTo Supplier, Purchase belongsTo Product (data lama).
 */
class PurchaseController extends Controller
{
    // READ (list) - Eloquent + eager loading 2 relasi + search dengan nested where & whereHas
    public function index(Request $request)
    {
        $q = $request->query('q');

        $data['dataPurchase'] = Purchase::with(['supplier', 'product'])
            ->when($q, function ($query) use ($q) {
                // nested where: WHERE (product.name LIKE ? OR supplier.name LIKE ?)
                $query->where(function ($sub) use ($q) {
                    $sub->whereHas('product', fn ($p) => $p->where('name', 'like', "%{$q}%"))
                        ->orWhereHas('supplier', fn ($s) => $s->where('name', 'like', "%{$q}%"));
                });
            })
            ->latest('purchase_date')
            ->latest('id')
            ->paginate(10)
            ->withQueryString();
        $data['q'] = $q;

        return view('admin.purchase.index', $data);
    }

    public function create()
    {
        return view('admin.purchase.create', $this->formOptions());
    }

    // CREATE - Eloquent: Model::create()
    public function store(Request $request)
    {
        Purchase::create($this->validated($request));

        return redirect()->route('purchase.index')->with('success', 'Penambahan Data Berhasil!');
    }

    public function show(string $id)
    {
        return redirect()->route('purchase.edit', $id);
    }

    public function edit(string $id)
    {
        $data = $this->formOptions();
        $data['dataPurchase'] = Purchase::findOrFail($id);
        return view('admin.purchase.edit', $data);
    }

    // UPDATE - Eloquent: findOrFail()->update()
    public function update(Request $request, string $id)
    {
        Purchase::findOrFail($id)->update($this->validated($request));

        return redirect()->route('purchase.index')->with('success', 'Perubahan Data Berhasil!');
    }

    // DELETE - Eloquent: findOrFail()->delete()
    public function destroy(string $id)
    {
        Purchase::findOrFail($id)->delete();

        return redirect()->route('purchase.index')->with('success', 'Data Berhasil Dihapus!');
    }

    private function formOptions(): array
    {
        return [
            'dataSupplier' => Supplier::orderBy('name')->get(),
            'dataProduct' => Product::orderBy('name')->get(),
        ];
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'supplier_id' => 'required|exists:suppliers,id',
            'product_id' => 'required|exists:products,product_id',
            'quantity' => 'required|integer|min:1',
            'unit_cost' => 'required|numeric|min:0',
            'purchase_date' => 'required|date',
            'status' => 'required|in:Pending,Received',
        ]);
    }
}
