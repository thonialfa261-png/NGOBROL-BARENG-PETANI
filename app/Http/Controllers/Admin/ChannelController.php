<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\channel; 

class ChannelController extends Controller
{
    public function index()
    {
        $channels = channel::all();
        return view('admin.channel.index', compact('channels'));
    }

    public function create()
    {
        return view('admin.channel.create');
    }

    public function store(Request $request)
    {
        channel::create($request->all());
        return redirect()->route('admin.channel.index');
    }

    public function edit($id)
    {
        $item = channel::findOrFail($id);
        return view('admin.channel.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
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