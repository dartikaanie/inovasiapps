<?php

namespace App\Models;

use App\User;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class juri
 * @package App\Models
 * @version March 19, 2019, 8:58 am UTC
 *
 * @property \App\Models\users users
 * @property \Illuminate\Database\Eloquent\Collection kategoris
 * @property \Illuminate\Database\Eloquent\Collection streams
 * @property integer nip
 * @property integer kategori_id
 * @property integer stream_id
 * @property integer status_aktif
 */
class juri extends Model
{
    use SoftDeletes;

    public $table = 'juris';
    

    protected $dates = ['deleted_at'];
    protected $primaryKey = "nip";


    public $fillable = [
        'nip',
        'kategori_id',
        'stream_id',
        'status_aktif'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nip' => 'integer',
        'kategori_id' => 'integer',
        'stream_id' => 'integer',
        'status_aktif' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nip' => 'required',
        'kategori_id' => 'required',
        'stream_id' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function users()
    {
        return $this->belongsTo(User::class, 'nip', 'nip');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function kategoris()
    {
        return $this->belongsTo(kategori::class, 'kategori_id', 'kategori_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function streams()
    {
        return $this->belongsTo(stream::class, 'stream_id', 'stream_id');
    }
}
