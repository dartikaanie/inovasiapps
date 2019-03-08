<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class kriteria
 * @package App\Models
 * @version March 8, 2019, 4:05 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection kategoris
 * @property integer kategori_id
 * @property string nama_kriteria
 */
class kriteria extends Model
{
    use SoftDeletes;

    public $table = 'kriterias';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'kategori_id',
        'nama_kriteria'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'kategori_id' => 'integer',
        'nama_kriteria' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'kategori_id' => 'required',
        'nama_kriteria' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function kategoris()
    {
        return $this->belongsTo(kategori::class, 'kategori_id', 'kategori_id');
    }
}
