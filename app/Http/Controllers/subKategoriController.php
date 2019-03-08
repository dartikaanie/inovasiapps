<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatesubKategoriRequest;
use App\Http\Requests\UpdatesubKategoriRequest;
use App\Models\kategori;
use App\Repositories\subKategoriRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class subKategoriController extends AppBaseController
{
    /** @var  subKategoriRepository */
    private $subKategoriRepository;

    public function __construct(subKategoriRepository $subKategoriRepo)
    {
        $this->subKategoriRepository = $subKategoriRepo;
    }

    /**
     * Display a listing of the subKategori.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->subKategoriRepository->pushCriteria(new RequestCriteria($request));
        $subKategoris = $this->subKategoriRepository->all();

        return view('sub_kategoris.index')
            ->with('subKategoris', $subKategoris);
    }

    /**
     * Show the form for creating a new subKategori.
     *
     * @return Response
     */
    public function create()
    {
        $kategoris = kategori::pluck('nama_kategori','kategori_id');
        return view('sub_kategoris.create', compact('kategoris'));
    }

    /**
     * Store a newly created subKategori in storage.
     *
     * @param CreatesubKategoriRequest $request
     *
     * @return Response
     */
    public function store(CreatesubKategoriRequest $request)
    {
        $input = $request->all();

        $subKategori = $this->subKategoriRepository->create($input);

        Flash::success('Sub Kategori saved successfully.');

        return redirect(route('subKategoris.index'));
    }

    /**
     * Display the specified subKategori.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $subKategori = $this->subKategoriRepository->findWithoutFail($id);

        if (empty($subKategori)) {
            Flash::error('Sub Kategori not found');

            return redirect(route('subKategoris.index'));
        }

        return view('sub_kategoris.show')->with('subKategori', $subKategori);
    }

    /**
     * Show the form for editing the specified subKategori.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $subKategori = $this->subKategoriRepository->findWithoutFail($id);

        if (empty($subKategori)) {
            Flash::error('Sub Kategori not found');

            return redirect(route('subKategoris.index'));
        }

        return view('sub_kategoris.edit')->with('subKategori', $subKategori);
    }

    /**
     * Update the specified subKategori in storage.
     *
     * @param  int              $id
     * @param UpdatesubKategoriRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatesubKategoriRequest $request)
    {
        $subKategori = $this->subKategoriRepository->findWithoutFail($id);

        if (empty($subKategori)) {
            Flash::error('Sub Kategori not found');

            return redirect(route('subKategoris.index'));
        }

        $subKategori = $this->subKategoriRepository->update($request->all(), $id);

        Flash::success('Sub Kategori updated successfully.');

        return redirect(route('subKategoris.index'));
    }

    /**
     * Remove the specified subKategori from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $subKategori = $this->subKategoriRepository->findWithoutFail($id);

        if (empty($subKategori)) {
            Flash::error('Sub Kategori not found');

            return redirect(route('subKategoris.index'));
        }

        $this->subKategoriRepository->delete($id);

        Flash::success('Sub Kategori deleted successfully.');

        return redirect(route('subKategoris.index'));
    }
}
