<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterAspekSurvey extends Model
{
    protected $table = 'master_aspek_survey';
    protected $fillable = ['nama_aspek'];

    public function pertanyaan()
    {
        return $this->hasMany(MasterPertanyaan::class, 'aspek_id');
    }
}