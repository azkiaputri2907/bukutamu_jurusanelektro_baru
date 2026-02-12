<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $table = 'survey';
    protected $fillable = ['kunjungan_id', 'kritik_saran'];
// Tambahkan ini di dalam setiap class Model
protected $dateFormat = 'Y-m-d';

// Agar Laravel otomatis mengisi tanggal saat create
public $timestamps = true;
    public function detail()
    {
        return $this->hasMany(DetailSurvey::class, 'survey_id');
    }

    public function kunjungan()
    {
        return $this->belongsTo(Kunjungan::class, 'kunjungan_id');
    }
}