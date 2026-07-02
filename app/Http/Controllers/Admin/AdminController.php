<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kecamatan;
use App\Models\Channel;

class AdminController extends Controller
{
    public function index()
    {
        $totalKecamatan = Kecamatan::count();
        $totalChannel = Channel::count();
        $chartData = Kecamatan::withCount('channels')->get();
        return view('admin.dashboard', compact('totalKecamatan', 'totalChannel', 'chartData'));
    }
}