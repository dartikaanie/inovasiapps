<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class subKriteria
 * @package App\Models
 * @version March 8, 2019, 9:12 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection kriterias
 * @property integer kriteria_id
 * @property string sub_kriteria
 * @property string rentang1
 * @property string keterangan1
 * @property string rentang2
 * @property string keterangan2
 * @property string rentang3
 * @property string keterangan3
 * @property string rentang4
 * @property string keterangan4
 */
class subKriteria extends Model
{
    use SoftDeletes;

    public $table = 'sub_kriterias';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'kriteria_id',
        'sub_kriteria',
        'rentang1',
        'keterangan1',
        'rentang2',
        'keterangan2',
        'rentang3',
        'keterangan3',
        'rentang4',
        'keterangan4'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'kriteria_id' => 'integer',
        'sub_kriteria' => 'string',
        'rentang1' => 'string',
        'keterangan1' => 'string',
        'rentang2' => 'string',
        'keterangan2' => 'string',
        'rentang3' => 'string',
        'keterangan3' => 'string',
        'rentang4' => 'string',
        'keterangan4' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'kriteria_id' => 'required',
        'sub_kriteria' => 'required',
        'keterangan1' => 'required',
        'rentang2' => 'required',
        'keterangan2' => 'required',
        'rentang3' => 'required',
        'keterangan3' => 'required',
        'rentang4' => 'required',
        'keterangan4' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function kriterias()
    {
        return $this->belongsTo(kriteria::class, 'kriteria_id', 'kriteria_id');
    }
}
