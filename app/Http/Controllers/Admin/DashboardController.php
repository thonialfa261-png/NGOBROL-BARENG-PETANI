<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\kecamatan;
use App\Models\channel;

class DashboardController extends Controller
{
    public function index()
    {
        $totalKecamatan = kecamatan::count();
        $totalChannel = channel::count();

        return view('admin.dashboard', compact('totalKecamatan', 'totalChannel'));
    }
}