<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\channel; 
use App\Models\kecamatan;

class ChannelController extends Controller
{
    public function index()
    {
        $channels = channel::with('kecamatan')->get();
        return view('admin.channel.index', compact('channels'));
    }

    public function create()
    {
        $kecamatans = kecamatan::all();
        return view('admin.channel.create', compact('kecamatans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_channel' => 'required',
            'kecamatan_id' => 'required',
        ]);

        channel::create($request->all());
        return redirect()->route('admin.channel.index');
    }

    public function edit($id)
    {
        $item = channel::findOrFail($id);
        $kecamatans = kecamatan::all();
        
        return view('admin.channel.edit', compact('item', 'kecamatans'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_channel' => 'required',
            'kecamatan_id' => 'required',
        ]);

        $item = channel::findOrFail($id);
        $item->update($request->all());
        return redirect()->route('admin.channel.index');
    }

    public function destroy($id)
    {
        $item = channel::findOrFail($id);
        $item->delete();
        return redirect()->route('admin.channel.index');
    }
}