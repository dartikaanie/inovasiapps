<?php

namespace App\Repositories;

use App\Models\kendala;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class kendalaRepository
 * @package App\Repositories
 * @version March 19, 2019, 2:32 am UTC
 *
 * @method kendala findWithoutFail($id, $columns = ['*'])
 * @method kendala find($id, $columns = ['*'])
 * @method kendala first($columns = ['*'])
*/
class kendalaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'inovasi_id',
        'isi_kendala',
        'solusi'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return kendala::class;
    }
}
