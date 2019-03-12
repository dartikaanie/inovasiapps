<?php

namespace App\Models;

use App\User;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class anggitaTim
 * @package App\Models
 * @version March 8, 2019, 7:08 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection users
 * @property \Illuminate\Database\Eloquent\Collection tims
 * @property \Illuminate\Database\Eloquent\Collection status_anggotas
 * @property integer nip
 * @property integer tim_id
 * @property integer status_anggota_id
 */
class anggotaTim extends Model
{
    use SoftDeletes;

    public $table = 'anggota_tims';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nip',
        'tim_id',
        'status_anggota_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nip' => 'integer',
        'tim_id' => 'integer',
        'status_anggota_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nip' => 'required',
        'tim_id' => 'required',
        'status_anggota_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function users()
    {
        return $this->belongsTo(User::class, 'nip', 'nip');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function tims()
    {
        return $this->belongsTo(tim::class, 'tim_id', 'tim_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function statusAnggotas()
    {
        return $this->belongsTo(statusAnggota::class, 'status_anggota_id', 'status_anggota_id');
    }
}
