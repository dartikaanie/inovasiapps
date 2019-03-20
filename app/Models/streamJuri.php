<?php

namespace App\Models;

use App\User;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class streamJuri
 * @package App\Models
 * @version March 15, 2019, 9:07 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection streams
 * @property \Illuminate\Database\Eloquent\Collection  usres
 * @property integer stream_id
 * @property integer nip_juri
 */
class streamJuri extends Model
{
    use SoftDeletes;

    public $table = 'stream_juris';
    

    protected $dates = ['deleted_at'];
    protected $primaryKey ="stream_juri_id";


    public $fillable = [
        'stream_id',
        'nip_juri'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'stream_id' => 'integer',
        'nip_juri' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'stream_id' => 'required',
        'nip_juri' => 'required'
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
    public function users()
    {
        return $this->belongsTo(User::class, 'nip_juri', 'nip');
    }
}
