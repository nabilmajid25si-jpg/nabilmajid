<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $data['dataOrder'] = Order::all();
        return view('admin.order.index', $data);
    }

    public function create()
    {
        return view('admin.order.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'order_number' => 'required|string|max:50|unique:orders,order_number',
            'customer_name' => 'required|string|max:150',
            'order_date' => 'required|date',
            'total_amount' => 'required|numeric|min:0',
            'status' => 'required|in:Pending,Processing,Completed,Cancelled',
        ]);

        Order::create($data);

        return redirect()->route('order.index')->with('success', 'Penambahan Data Berhasil!');
    }

    public function show(string $id)
    {
        return redirect()->route('order.edit', $id);
    }

    public function edit(string $id)
    {
        $data['dataOrder'] = Order::findOrFail($id);
        return view('admin.order.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'order_number' => "required|string|max:50|unique:orders,order_number,{$id},order_id",
            'customer_name' => 'required|string|max:150',
            'order_date' => 'required|date',
            'total_amount' => 'required|numeric|min:0',
            'status' => 'required|in:Pending,Processing,Completed,Cancelled',
        ]);

        Order::findOrFail($id)->update($data);

        return redirect()->route('order.index')->with('success', 'Perubahan Data Berhasil!');
    }

    public function destroy(string $id)
    {
        Order::findOrFail($id)->delete();

        return redirect()->route('order.index')->with('success', 'Data Berhasil Dihapus!');
    }
}
