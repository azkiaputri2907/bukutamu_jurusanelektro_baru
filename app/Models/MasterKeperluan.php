<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterKeperluan extends Model
{
    protected $table = 'master_keperluan';
    protected $fillable = ['keterangan'];
}
