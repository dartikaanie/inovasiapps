<?php

namespace App\Repositories;

use App\Models\inovasi;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class inovasiRepository
 * @package App\Repositories
 * @version March 8, 2019, 7:32 am UTC
 *
 * @method inovasi findWithoutFail($id, $columns = ['*'])
 * @method inovasi find($id, $columns = ['*'])
 * @method inovasi first($columns = ['*'])
*/
class inovasiRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
        'status_registrasi'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return inovasi::class;
    }
}
