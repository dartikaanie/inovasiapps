<?php

namespace App\Repositories;

use App\Models\penilaianTim;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class penilaianTimRepository
 * @package App\Repositories
 * @version March 8, 2019, 8:03 am UTC
 *
 * @method penilaianTim findWithoutFail($id, $columns = ['*'])
 * @method penilaianTim find($id, $columns = ['*'])
 * @method penilaianTim first($columns = ['*'])
*/
class penilaianTimRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'stream_id',
        'sub_kategori_id',
        'sub_kriteria_id',
        'nilai',
        'saran'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return penilaianTim::class;
    }
}
