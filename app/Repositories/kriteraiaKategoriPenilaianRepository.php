<?php

namespace App\Repositories;

use App\Models\kriteraiaKategoriPenilaian;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class kriteraiaKategoriPenilaianRepository
 * @package App\Repositories
 * @version March 8, 2019, 4:25 am UTC
 *
 * @method kriteraiaKategoriPenilaian findWithoutFail($id, $columns = ['*'])
 * @method kriteraiaKategoriPenilaian find($id, $columns = ['*'])
 * @method kriteraiaKategoriPenilaian first($columns = ['*'])
*/
class kriteraiaKategoriPenilaianRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'sub_kriteria_id',
        'sub_kategori_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return kriteraiaKategoriPenilaian::class;
    }
}
