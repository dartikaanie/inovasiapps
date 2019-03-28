<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class departemen extends Model
{
    public $table = 'departemen';


    public function departemens()
    {
        return $this->belongsTo(departemen::class, 'departemen', 'departemen_id');
    }
}
