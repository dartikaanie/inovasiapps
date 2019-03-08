<?php

namespace App\Repositories;

use App\Models\kriteria;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class kriteriaRepository
 * @package App\Repositories
 * @version March 8, 2019, 4:05 am UTC
 *
 * @method kriteria findWithoutFail($id, $columns = ['*'])
 * @method kriteria find($id, $columns = ['*'])
 * @method kriteria first($columns = ['*'])
*/
class kriteriaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'kategori_id',
        'nama_kriteria'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return kriteria::class;
    }
}
