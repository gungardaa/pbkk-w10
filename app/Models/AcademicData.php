<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicData extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nim',
        'prodi',
        'fakultas',
        'angkatan',
        'email',
        'alamat',
        'ipk',
    ];
}