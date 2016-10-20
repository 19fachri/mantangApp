<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $table = 'kegiatan';
    protected $fillable= ['judul', 'deskripsi', 'cover','tanggal_mulai', 'tanggal_selesai'];
}
