<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class stream
 * @package App\Models
 * @version March 8, 2019, 7:50 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection users
 * @property \Illuminate\Database\Eloquent\Collection inovasis
 * @property integer nip_juri
 * @property integer inovasi_id
 * @property string nama_stream
 */
class stream extends Model
{
    use SoftDeletes;

    public $table = 'streams';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nip_juri',
        'inovasi_id',
        'nama_stream'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nip_juri' => 'integer',
        'inovasi_id' => 'integer',
        'nama_stream' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nip_juri' => 'required',
        'inovasi_id' => 'required',
        'nama_stream' => 'requires'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function users()
    {
        return $this->hasMany(\App\Models\users::class, ' nip_juri', 'nip_inisiator');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function inovases()
    {
        return $this->hasMany(\App\Models\inovasis::class, ' inovasi_id', 'inovasi_id');
    }
}
