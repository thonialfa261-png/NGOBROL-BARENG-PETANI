<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class channel extends Model
{
use HasFactory;
    protected $guarded = [];
    protected $fillable = ['nama_channel','slug','description','kecamatan_id'];

    public function kecamatan() {
        return $this->belongsTo(kecamatan::class, 'kecamatan_id');
    }
}