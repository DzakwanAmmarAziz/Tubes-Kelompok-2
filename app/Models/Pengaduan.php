<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    protected $table = 'pengaduan';
    protected $primaryKey = 'no_pengaduan';
    public $incrementing = false;
    // protected $guarded = ['no_pengaduan'];

    protected $fillable = [
        'no_pengaduan',
        'judul',
        'user_id',
        'gedung_id',
        'isi',
        'gambar',
        'status',
        'tanggapan'
    ];

    protected $with = ['gedung', 'user'];

    public function gedung()
    {
        return $this->belongsTo(Gedung::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getRouteKeyName()
    {
        return "no_pengaduan";
    }
}
