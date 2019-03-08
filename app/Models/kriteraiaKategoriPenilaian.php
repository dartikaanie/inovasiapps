<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class kriteraiaKategoriPenilaian
 * @package App\Models
 * @version March 8, 2019, 4:25 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection sub_kriterias
 * @property \Illuminate\Database\Eloquent\Collection sub_kategoris
 * @property integer sub_kriteria_id
 * @property integer sub_kategori_id
 */
class kriteraiaKategoriPenilaian extends Model
{
    use SoftDeletes;

    public $table = 'kriteraia_kategori_penilaians';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'sub_kriteria_id',
        'sub_kategori_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'sub_kriteria_id' => 'integer',
        'sub_kategori_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'sub_kriteria_id' => 'required',
        'sub_kategori_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function subKriterias()
    {
        return $this->belongsTo(subKriteria::class, 'sub_kriteria_id', 'sub_kriteria_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function subKategoris()
    {
        return $this->belongsTo(subKategori::class, 'sub_kategori_id', 'sub_kategori_id');
    }
}
