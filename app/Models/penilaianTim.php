<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class penilaianTim
 * @package App\Models
 * @version March 8, 2019, 8:03 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection streams
 * @property \Illuminate\Database\Eloquent\Collection sub_kategoris
 * @property \Illuminate\Database\Eloquent\Collection sub_kriterias
 * @property integer stream_id
 * @property integer sub_kategori_id
 * @property integer sub_kriteria_id
 * @property integer nilai
 * @property string saran
 */
class penilaianTim extends Model
{
    use SoftDeletes;

    public $table = 'penilaian_tims';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'stream_id',
        'sub_kategori_id',
        'sub_kriteria_id',
        'nilai',
        'saran'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'stream_id' => 'integer',
        'sub_kategori_id' => 'integer',
        'sub_kriteria_id' => 'integer',
        'nilai' => 'integer',
        'saran' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'stream_id' => 'required',
        'sub_kategori_id' => 'required',
        'sub_kriteria_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function streams()
    {
        return $this->hasMany(\App\Models\streams::class, ' stream_id', 'stream_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function subKategoris()
    {
        return $this->hasMany(\App\Models\sub_kategoris::class, ' sub_kategori_id', ' sub_kategori_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function subKriterias()
    {
        return $this->hasMany(\App\Models\sub_kriterias::class, ' sub_kriteria_id', ' sub_kriteria_id');
    }
}
