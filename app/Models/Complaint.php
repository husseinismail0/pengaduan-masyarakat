<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

    const BELUM_SELESAI = 'Belum Di Tangani';
    const PROSES = 'Proses';
    const SELESAI = 'Sudah Di Tangani';

    protected $fillable = [
        'photo'
    ];
}
