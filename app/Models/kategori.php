<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class kategori
 * @package App\Models
 * @version March 8, 2019, 3:49 am UTC
 *
 * @property string nama_kategori
 */
class kategori extends Model
{
    use SoftDeletes;

    public $table = 'kategoris';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama_kategori'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nama_kategori' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama_kategori' => 'required'
    ];

    
}
