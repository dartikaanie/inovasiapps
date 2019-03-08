<?php

namespace App\Repositories;

use App\Models\subKategori;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class subKategoriRepository
 * @package App\Repositories
 * @version March 8, 2019, 3:52 am UTC
 *
 * @method subKategori findWithoutFail($id, $columns = ['*'])
 * @method subKategori find($id, $columns = ['*'])
 * @method subKategori first($columns = ['*'])
*/
class subKategoriRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'kategori_id',
        'nama_sub_kategori',
        'keterangan'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return subKategori::class;
    }
}
