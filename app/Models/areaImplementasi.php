<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class areaImplementasi extends Model
{
    use SoftDeletes;

    public $table = 'area_implementasi';

    public $fillable = [
        'area_implementasi'
        ];
}
