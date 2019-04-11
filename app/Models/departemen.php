<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class departemen extends Model
{

    use SoftDeletes;

    public $table = 'departemen';


    public function departemens()
    {
        return $this->belongsTo(departemen::class, 'departemen', 'departemen_id');
    }
}
