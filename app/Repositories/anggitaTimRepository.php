<?php

namespace App\Repositories;

use App\Models\anggitaTim;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class anggitaTimRepository
 * @package App\Repositories
 * @version March 8, 2019, 7:08 am UTC
 *
 * @method anggitaTim findWithoutFail($id, $columns = ['*'])
 * @method anggitaTim find($id, $columns = ['*'])
 * @method anggitaTim first($columns = ['*'])
*/
class anggitaTimRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nip',
        'tim_id',
        'status_anggota_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return anggitaTim::class;
    }
}
