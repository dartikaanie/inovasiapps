<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class inovasi
 * @package App\Models
 * @version March 8, 2019, 7:32 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection tims
 * @property \Illuminate\Database\Eloquent\Collection users
 * @property \Illuminate\Database\Eloquent\Collection sub_kategoris
 * @property integer tim_id
 * @property string area_implementasi
 * @property integer nip_inisiator
 * @property integer sub_kategori_id
 * @property string judul
 * @property string latar_belakang
 * @property string tujuan_inovasi
 * @property integer saving
 * @property integer opp_lost
 * @property integer status_implementasi
 * @property date tgl_pelaksanaan
 * @property string dokumen_tim
 * @property integer status_registrasi
 */
class inovasi extends Model
{
    use SoftDeletes;

    public $table = 'inovasis';
    

    protected $dates = ['deleted_at'];
    protected $primaryKey = "inovasi_id";


    public $fillable = [
        'tim_id',
        'area_implementasi',
        'nip_inisiator',
        'sub_kategori_id',
        'judul',
        'latar_belakang',
        'tujuan_inovasi',
        'saving',
        'opp_lost',
        'status_implementasi',
        'tgl_pelaksanaan',
        'dokumen_tim',
        'status_registrasi',
        'dokumen_pendukung',
        'revenue',
        'stream_id'

    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'tim_id' => 'integer',
        'area_implementasi' => 'string',
        'nip_inisiator' => 'integer',
        'sub_kategori_id' => 'integer',
        'judul' => 'string',
        'latar_belakang' => 'string',
        'tujuan_inovasi' => 'string',
        'saving' => 'integer',
        'opp_lost' => 'integer',
        'status_implementasi' => 'integer',
        'tgl_pelaksanaan' => 'date',
        'dokumen_tim' => 'string',
        'status_registrasi' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'tim_id' => 'required',
        'area_implementasi' => 'required',
        'sub_kategori_id' => 'required',
        'judul' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function TimInovasi()
    {
        return $this->belongsTo(tim::class, 'tim_id', 'tim_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function users()
    {
        return $this->hasMany(\App\Models\users::class, ' nip', 'nip_inisiator');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function subKategoris()
    {
        return $this->belongsTo(subKategori::class, 'sub_kategori_id', 'sub_kategori_id');
    }
}
