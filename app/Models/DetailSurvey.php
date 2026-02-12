<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailSurvey extends Model
{
    protected $table = 'detail_survey';
    protected $fillable = ['survey_id', 'p1', 'p2', 'p3', 'p4', 'p5'];
    protected $dateFormat = 'Y-m-d';
    public $timestamps = true;
    public function survey()
    {
        return $this->belongsTo(Survey::class, 'survey_id');
    }
    public function pertanyaan()
    {
        return $this->belongsTo(MasterPertanyaan::class, 'pertanyaan_id');
    }
}