<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KecamatanController;
use App\Http\Controllers\Admin\ChannelController;
use App\Http\Controllers\Admin\UserController;

use App\Models\Message;
use App\Models\channel; 

Route::get('/', function () {
    $channels = channel::with('kecamatan')->get();
    return view('welcome', compact('channels'));
});

Route::get('/dashboard', function () {
    $channels = channel::all();

    $firstChannel = channel::first();

    if ($firstChannel) {
        return redirect()->route('chat.room', $firstChannel->id);
    }
    return view('dashboard', compact('channels'));
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard/chat/{id}', function($id) {
    $channels = channel::all();
    $activeChannel = channel::with('kecamatan')->findOrFail($id);
    $messages = Message::where('channel_id', $id)->with('user')->get(); 
    return view('dashboard', compact('channels', 'activeChannel', 'messages'));
})->middleware(['auth'])->name('chat.room');

Route::post('/dashboard/chat/{id}/send', function(Request $request, $id) {
    $request->validate([
        'pesan' => 'required|string|max:1000',
        'image' => 'nullable|image|max:2048'
    ]);

    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('chat_images', 'public');
    }

    Message::create([
        'user_id' => auth()->id(),
        'channel_id' => $id,
        'pesan' => $request->pesan,
        'image_path' => $imagePath 
    ]);

    return redirect()->back();
})->middleware(['auth'])->name('chat.send');

Route::middleware('auth')->group(function () {
    Route::get('/chat/join/{id}', function ($id) {
        return redirect('/dashboard')->with('status', 'Selamat bergabung di saluran obrolan!');
    })->name('chat.join');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard'); 
    
    Route::get('/stats', [DashboardController::class, 'index'])->name('stats'); 
    
    Route::resource('kecamatan', KecamatanController::class);
    Route::resource('channel', ChannelController::class);
    Route::resource('user', UserController::class);
});

require __DIR__.'/auth.php';