<?php

namespace App\Models;

use App\User;
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
    protected $primaryKey = "stream_id";


    public $fillable = [
        'nama_stream', 'kategori_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nama_stream' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama_stream' => 'required',
        'kategori_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/


    public function kategoris()
    {
        return $this->belongsTo(kategori::class, 'kategori_id', 'kategori_id');
    }

}
