<?php

namespace App\Repositories;

use App\Models\stream;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class streamRepository
 * @package App\Repositories
 * @version March 8, 2019, 7:50 am UTC
 *
 * @method stream findWithoutFail($id, $columns = ['*'])
 * @method stream find($id, $columns = ['*'])
 * @method stream first($columns = ['*'])
*/
class streamRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nip_juri',
        'inovasi_id',
        'nama_stream'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return stream::class;
    }
}
