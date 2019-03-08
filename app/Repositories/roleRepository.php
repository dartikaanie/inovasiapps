<?php

namespace App\Repositories;

use App\Models\role;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class roleRepository
 * @package App\Repositories
 * @version March 6, 2019, 9:01 am UTC
 *
 * @method role findWithoutFail($id, $columns = ['*'])
 * @method role find($id, $columns = ['*'])
 * @method role first($columns = ['*'])
*/
class roleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'role_id',
        'role'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return role::class;
    }
}
