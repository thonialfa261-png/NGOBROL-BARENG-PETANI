<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class kecamatan extends Model
{
    protected $guarded =[];
    protected $fillable = ['nama_kecamatan'];

    public function channels() {
        return $this->hasMany(channel::class);
    }
}
