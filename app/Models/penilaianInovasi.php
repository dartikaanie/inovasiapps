<?php

namespace App\Models;

use App\User;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class penilaianTim
 * @package App\Models
 * @version March 8, 2019, 8:03 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection streams
 * @property \Illuminate\Database\Eloquent\Collection sub_kategoris
 * @property \Illuminate\Database\Eloquent\Collection sub_kriterias
 * @property integer stream_id
 * @property integer sub_kategori_id
 * @property integer sub_kriteria_id
 * @property integer nilai
 * @property string saran
 */
class penilaianInovasi extends Model
{
    use SoftDeletes;

    public $table = 'penilaian_inovasi';


    protected $dates = ['deleted_at'];
    protected  $primaryKey = "penilaian_inovasi_id";

    public $fillable = [
        'inovasi_id',
        'nip_juri',

        'status_penilaian'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'nip_juri', 'nip');
    }
}
