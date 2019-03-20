<?php

namespace App\Repositories;

use App\Models\juri;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class juriRepository
 * @package App\Repositories
 * @version March 19, 2019, 8:58 am UTC
 *
 * @method juri findWithoutFail($id, $columns = ['*'])
 * @method juri find($id, $columns = ['*'])
 * @method juri first($columns = ['*'])
*/
class juriRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nip',
        'kategori_id',
        'stream_id',
        'status_aktif'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return juri::class;
    }
}
