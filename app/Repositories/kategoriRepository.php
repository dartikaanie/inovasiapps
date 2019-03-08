<?php

namespace App\Repositories;

use App\Models\kategori;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class kategoriRepository
 * @package App\Repositories
 * @version March 8, 2019, 3:49 am UTC
 *
 * @method kategori findWithoutFail($id, $columns = ['*'])
 * @method kategori find($id, $columns = ['*'])
 * @method kategori first($columns = ['*'])
*/
class kategoriRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama_kategori'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return kategori::class;
    }
}
