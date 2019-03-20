<?php

namespace App\Repositories;

use App\Models\streamInovasi;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class streamInovasiRepository
 * @package App\Repositories
 * @version March 15, 2019, 9:08 am UTC
 *
 * @method streamInovasi findWithoutFail($id, $columns = ['*'])
 * @method streamInovasi find($id, $columns = ['*'])
 * @method streamInovasi first($columns = ['*'])
*/
class streamInovasiRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'stream_id',
        'inovasi_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return streamInovasi::class;
    }
}
