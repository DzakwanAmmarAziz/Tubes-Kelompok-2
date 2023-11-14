<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gedung extends Model
{
    use HasFactory;
    protected $table = 'gedung';
    protected $guarded = ['id'];

    public function pengaduan()
    {
        return $this->hasMany(Pengaduan::class);
    }
}
