<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\kecamatan;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    public function index() {
        $kecamatans = kecamatan::all();
        return view('admin.kecamatan.index', compact('kecamatans'));
    }
    public function create() {
        return view('admin.kecamatan.create');
    }
    public function store(Request $request) {
        kecamatan::create($request->all());
        return redirect()->route('admin.kecamatan.index');
    }
    public function edit($id)
{
    $item = kecamatan::findOrFail($id);
    return view('admin.kecamatan.edit', compact('item'));
}

public function update(Request $request, $id)
{
    $item = kecamatan::findOrFail($id);
    $item->update($request->all());
    return redirect()->route('admin.kecamatan.index');
}

public function destroy($id)
{
    $item = kecamatan::findOrFail($id);
    $item->delete();
    return redirect()->route('admin.kecamatan.index');
}
}
