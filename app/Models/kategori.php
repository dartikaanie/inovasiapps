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
    protected $primaryKey = "kategori_id";


    public $fillable = [
        'nama_kategori', 'kategori_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nama_kategori' => 'string',
         'kategori_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama_kategori' => 'required',
        'kategori_id' => 'required'
    ];

    
}
