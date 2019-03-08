<?php

namespace App\Repositories;

use App\Models\statusAnggota;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class statusAnggotaRepository
 * @package App\Repositories
 * @version March 8, 2019, 7:09 am UTC
 *
 * @method statusAnggota findWithoutFail($id, $columns = ['*'])
 * @method statusAnggota find($id, $columns = ['*'])
 * @method statusAnggota first($columns = ['*'])
*/
class statusAnggotaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'status_anggota'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return statusAnggota::class;
    }
}
