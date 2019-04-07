<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class tim
 * @package App\Models
 * @version March 8, 2019, 7:01 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection users
 * @property string nama
 * @property string departemen
 * @property integer nip
 */
class tim extends Model
{
    use SoftDeletes;

    public $table = 'tims';
    

    protected $dates = ['deleted_at'];
    protected $primaryKey = "tim_id";


    public $fillable = [
        'nama_tim',
        'departemen',
        'nip'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nama' => 'string',
        'departemen' => 'string',
        'nip' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama_tim' => 'required',
        'departemen' => 'required',
        'nip' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function users()
    {
        return $this->hasMany(\App\Models\users::class, ' nip', 'nip');
    }

    public function inovasis()
    {
        return $this->belongsTo(inovasi::class, 'tim_id', 'tim_id');
    }

    public function anggotaTims(){
        return $this->belongsTo(anggotaTim::class, 'tim_id', 'tim_id');
    }

    public function departemens(){
        return $this->belongsTo(unitBiro::class, 'departemen', 'kode');
    }

}
