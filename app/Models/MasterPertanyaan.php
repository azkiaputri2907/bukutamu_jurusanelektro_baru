<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterPertanyaan extends Model
{
    protected $table = 'master_pertanyaan';
    protected $fillable = ['aspek_id', 'pertanyaan'];

    public function aspek()
    {
        return $this->belongsTo(MasterAspekSurvey::class, 'aspek_id');
    }
}