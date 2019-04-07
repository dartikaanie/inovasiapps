<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class kendala
 * @package App\Models
 * @version March 19, 2019, 2:32 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection inovasis
 * @property unsigned inovasi_id
 * @property string isi_kendala
 * @property string solusi
 */
class kendala extends Model
{
    use SoftDeletes;

    public $table = 'kendalas';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'inovasi_id',
        'isi_kendala',
        'tim_expert_id',
        'solusi'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'isi_kendala' => 'string',
        'solusi' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function inovasis()
    {
        return $this->belongsTo(inovasi::class, 'inovasi_id', 'inovasi_id');
    }

    public function expert()
    {
        return $this->belongsTo(expert::class, 'tim_expert_id', 'tim_expert_id');
    }
}
