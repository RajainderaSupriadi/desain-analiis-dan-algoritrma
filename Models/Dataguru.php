<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dataguru extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'nip', 'alamat', 'telepon', 'mata_pelajaran', 'jenis_kelamin', 'tanggal_lahir', 'status'
    ];
}
