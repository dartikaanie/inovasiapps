<?php

namespace App\Repositories;

use App\Models\tim;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class timRepository
 * @package App\Repositories
 * @version March 8, 2019, 7:01 am UTC
 *
 * @method tim findWithoutFail($id, $columns = ['*'])
 * @method tim find($id, $columns = ['*'])
 * @method tim first($columns = ['*'])
*/
class timRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'departemen',
        'nip'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return tim::class;
    }
}
