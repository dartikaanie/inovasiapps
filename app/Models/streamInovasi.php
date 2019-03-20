<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class streamInovasi
 * @package App\Models
 * @version March 15, 2019, 9:08 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection streams
 * @property \Illuminate\Database\Eloquent\Collection inovasis
 * @property integer stream_id
 * @property integer inovasi_id
 */
class streamInovasi extends Model
{
    use SoftDeletes;

    public $table = 'stream_inovasis';
    

    protected $dates = ['deleted_at'];
    protected $primaryKey = "stream_inovasi_id";


    public $fillable = [
        'stream_id',
        'inovasi_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'stream_id' => 'integer',
        'inovasi_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'stream_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function streams()
    {
        return $this->hasMany(\App\Models\streams::class, 'stream_id', 'stream_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function inovasis()
    {
        return $this->belongsTo(inovasi::class, 'inovasi_id', 'inovasi_id');
    }
}
