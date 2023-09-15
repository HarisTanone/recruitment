<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kandidat extends Model
{
    protected $table = 'kandidat'; // Set tabel menjadi null
    protected $fillable = [
        'id_cart',
        'nama',
        'usia',
        'kelamin',
        'phone_number',
        'email',
        'alamat',
        'agama',
        'bahasa',
        'extra_skill',
    ];
}
