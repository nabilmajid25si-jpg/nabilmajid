<?php

namespace App\Http\Controllers;

use App\Models\Analyst;
use Illuminate\Http\Request;

class AnalystController extends Controller
{
    public function index()
    {
        $data['dataAnalyst'] = Analyst::all();
        return view('admin.analyst.index', $data);
    }

    public function create()
    {
        return view('admin.analyst.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:150',
            'email' => 'required|email|unique:analysts,email',
            'phone' => 'required|numeric',
            'specialization' => 'required|string|max:100',
            'hire_date' => 'required|date',
            'status' => 'required|in:Active,Inactive',
        ]);

        Analyst::create($data);

        return redirect()->route('analyst.index')->with('success', 'Penambahan Data Berhasil!');
    }

    public function show(string $id)
    {
        return redirect()->route('analyst.edit', $id);
    }

    public function edit(string $id)
    {
        $data['dataAnalyst'] = Analyst::findOrFail($id);
        return view('admin.analyst.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:150',
            'email' => "required|email|unique:analysts,email,{$id},analyst_id",
            'phone' => 'required|numeric',
            'specialization' => 'required|string|max:100',
            'hire_date' => 'required|date',
            'status' => 'required|in:Active,Inactive',
        ]);

        Analyst::findOrFail($id)->update($data);

        return redirect()->route('analyst.index')->with('success', 'Perubahan Data Berhasil!');
    }

    public function destroy(string $id)
    {
        Analyst::findOrFail($id)->delete();

        return redirect()->route('analyst.index')->with('success', 'Data Berhasil Dihapus!');
    }
}
