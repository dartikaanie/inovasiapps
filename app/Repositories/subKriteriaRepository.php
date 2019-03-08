<?php

namespace App\Repositories;

use App\Models\subKriteria;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class subKriteriaRepository
 * @package App\Repositories
 * @version March 8, 2019, 9:12 am UTC
 *
 * @method subKriteria findWithoutFail($id, $columns = ['*'])
 * @method subKriteria find($id, $columns = ['*'])
 * @method subKriteria first($columns = ['*'])
*/
class subKriteriaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
     * Configure the Model
     **/
    public function model()
    {
        return subKriteria::class;
    }
}
