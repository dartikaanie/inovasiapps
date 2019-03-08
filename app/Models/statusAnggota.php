<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class statusAnggota
 * @package App\Models
 * @version March 8, 2019, 7:09 am UTC
 *
 * @property string status_anggota
 */
class statusAnggota extends Model
{
    use SoftDeletes;

    public $table = 'status_anggotas';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'status_anggota'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'status_anggota' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'status_anggota' => 'required'
    ];

    
}
