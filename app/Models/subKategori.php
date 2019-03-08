<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class subKategori
 * @package App\Models
 * @version March 8, 2019, 3:52 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection kategoris
 * @property integer kategori_id
 * @property string nama_sub_kategori
 * @property string keterangan
 */
class subKategori extends Model
{
    use SoftDeletes;

    public $table = 'sub_kategoris';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'kategori_id',
        'nama_sub_kategori',
        'keterangan'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'kategori_id' => 'integer',
        'nama_sub_kategori' => 'string',
        'keterangan' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'kategori_id' => 'required',
        'nama_sub_kategori' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function kategoris()
    {
        return $this->belongsTo(kategori::class, 'kategori_id', 'kategori_id');
    }
}
