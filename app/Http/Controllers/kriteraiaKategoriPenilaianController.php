<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatekriteraiaKategoriPenilaianRequest;
use App\Http\Requests\UpdatekriteraiaKategoriPenilaianRequest;
use App\Models\subKategori;
use App\Models\subKriteria;
use App\Repositories\kriteraiaKategoriPenilaianRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class kriteraiaKategoriPenilaianController extends AppBaseController
{
    /** @var  kriteraiaKategoriPenilaianRepository */
    private $kriteraiaKategoriPenilaianRepository;

    public function __construct(kriteraiaKategoriPenilaianRepository $kriteraiaKategoriPenilaianRepo)
    {
        $this->kriteraiaKategoriPenilaianRepository = $kriteraiaKategoriPenilaianRepo;
    }

    /**
     * Display a listing of the kriteraiaKategoriPenilaian.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->kriteraiaKategoriPenilaianRepository->pushCriteria(new RequestCriteria($request));
        $kriteraiaKategoriPenilaians = $this->kriteraiaKategoriPenilaianRepository->all();

        return view('kriteraia_kategori_penilaians.index')
            ->with('kriteraiaKategoriPenilaians', $kriteraiaKategoriPenilaians);
    }

    /**
     * Show the form for creating a new kriteraiaKategoriPenilaian.
     *
     * @return Response
     */
    public function create()
    {
        $sub_kriterias = subKriteria::pluck('sub_kriteria','sub_kriteria_id');
        $sub_kategoris = subKategori::pluck('nama_sub_kategori','sub_kategori_id');
        return view('kriteraia_kategori_penilaians.create', compact('sub_kategoris','sub_kriterias'));
    }

    /**
     * Store a newly created kriteraiaKategoriPenilaian in storage.
     *
     * @param CreatekriteraiaKategoriPenilaianRequest $request
     *
     * @return Response
     */
    public function store(CreatekriteraiaKategoriPenilaianRequest $request)
    {
        $input = $request->all();

        $kriteraiaKategoriPenilaian = $this->kriteraiaKategoriPenilaianRepository->create($input);

        Flash::success('Kriteraia Kategori Penilaian saved successfully.');

        return redirect(route('kriteraiaKategoriPenilaians.index'));
    }

    /**
     * Display the specified kriteraiaKategoriPenilaian.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $kriteraiaKategoriPenilaian = $this->kriteraiaKategoriPenilaianRepository->findWithoutFail($id);

        if (empty($kriteraiaKategoriPenilaian)) {
            Flash::error('Kriteraia Kategori Penilaian not found');

            return redirect(route('kriteraiaKategoriPenilaians.index'));
        }

        return view('kriteraia_kategori_penilaians.show')->with('kriteraiaKategoriPenilaian', $kriteraiaKategoriPenilaian);
    }

    /**
     * Show the form for editing the specified kriteraiaKategoriPenilaian.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $kriteraiaKategoriPenilaian = $this->kriteraiaKategoriPenilaianRepository->findWithoutFail($id);

        if (empty($kriteraiaKategoriPenilaian)) {
            Flash::error('Kriteraia Kategori Penilaian not found');

            return redirect(route('kriteraiaKategoriPenilaians.index'));
        }

        return view('kriteraia_kategori_penilaians.edit')->with('kriteraiaKategoriPenilaian', $kriteraiaKategoriPenilaian);
    }

    /**
     * Update the specified kriteraiaKategoriPenilaian in storage.
     *
     * @param  int              $id
     * @param UpdatekriteraiaKategoriPenilaianRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatekriteraiaKategoriPenilaianRequest $request)
    {
        $kriteraiaKategoriPenilaian = $this->kriteraiaKategoriPenilaianRepository->findWithoutFail($id);

        if (empty($kriteraiaKategoriPenilaian)) {
            Flash::error('Kriteraia Kategori Penilaian not found');

            return redirect(route('kriteraiaKategoriPenilaians.index'));
        }

        $kriteraiaKategoriPenilaian = $this->kriteraiaKategoriPenilaianRepository->update($request->all(), $id);

        Flash::success('Kriteraia Kategori Penilaian updated successfully.');

        return redirect(route('kriteraiaKategoriPenilaians.index'));
    }

    /**
     * Remove the specified kriteraiaKategoriPenilaian from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $kriteraiaKategoriPenilaian = $this->kriteraiaKategoriPenilaianRepository->findWithoutFail($id);

        if (empty($kriteraiaKategoriPenilaian)) {
            Flash::error('Kriteraia Kategori Penilaian not found');

            return redirect(route('kriteraiaKategoriPenilaians.index'));
        }

        $this->kriteraiaKategoriPenilaianRepository->delete($id);

        Flash::success('Kriteraia Kategori Penilaian deleted successfully.');

        return redirect(route('kriteraiaKategoriPenilaians.index'));
    }
}
