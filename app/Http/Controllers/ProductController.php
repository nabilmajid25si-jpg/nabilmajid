<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $data['dataProduct'] = Product::all();
        return view('admin.product.index', $data);
    }

    public function create()
    {
        return view('admin.product.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:150',
            'sku' => 'required|string|max:50|unique:products,sku',
            'category' => 'required|string|max:100',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'status' => 'required|in:Active,Inactive',
        ]);

        Product::create($data);

        return redirect()->route('product.index')->with('success', 'Penambahan Data Berhasil!');
    }

    public function show(string $id)
    {
        return redirect()->route('product.edit', $id);
    }

    public function edit(string $id)
    {
        $data['dataProduct'] = Product::findOrFail($id);
        return view('admin.product.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:150',
            'sku' => "required|string|max:50|unique:products,sku,{$id},product_id",
            'category' => 'required|string|max:100',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'status' => 'required|in:Active,Inactive',
        ]);

        Product::findOrFail($id)->update($data);

        return redirect()->route('product.index')->with('success', 'Perubahan Data Berhasil!');
    }

    public function destroy(string $id)
    {
        Product::findOrFail($id)->delete();

        return redirect()->route('product.index')->with('success', 'Data Berhasil Dihapus!');
    }
}
