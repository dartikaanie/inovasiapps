<?php

namespace App\Repositories;

use App\Models\streamJuri;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class streamJuriRepository
 * @package App\Repositories
 * @version March 15, 2019, 9:07 am UTC
 *
 * @method streamJuri findWithoutFail($id, $columns = ['*'])
 * @method streamJuri find($id, $columns = ['*'])
 * @method streamJuri first($columns = ['*'])
*/
class streamJuriRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'stream_id',
        'nip_juri'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return streamJuri::class;
    }
}
