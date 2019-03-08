<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatekategoriRequest;
use App\Http\Requests\UpdatekategoriRequest;
use App\Repositories\kategoriRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class kategoriController extends AppBaseController
{
    /** @var  kategoriRepository */
    private $kategoriRepository;

    public function __construct(kategoriRepository $kategoriRepo)
    {
        $this->kategoriRepository = $kategoriRepo;
    }

    /**
     * Display a listing of the kategori.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->kategoriRepository->pushCriteria(new RequestCriteria($request));
        $kategoris = $this->kategoriRepository->all();

        return view('kategoris.index')
            ->with('kategoris', $kategoris);
    }

    /**
     * Show the form for creating a new kategori.
     *
     * @return Response
     */
    public function create()
    {
        return view('kategoris.create');
    }

    /**
     * Store a newly created kategori in storage.
     *
     * @param CreatekategoriRequest $request
     *
     * @return Response
     */
    public function store(CreatekategoriRequest $request)
    {
        $input = $request->all();

        $kategori = $this->kategoriRepository->create($input);

        Flash::success('Kategori saved successfully.');

        return redirect(route('kategoris.index'));
    }

    /**
     * Display the specified kategori.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $kategori = $this->kategoriRepository->findWithoutFail($id);

        if (empty($kategori)) {
            Flash::error('Kategori not found');

            return redirect(route('kategoris.index'));
        }

        return view('kategoris.show')->with('kategori', $kategori);
    }

    /**
     * Show the form for editing the specified kategori.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $kategori = $this->kategoriRepository->findWithoutFail($id);

        if (empty($kategori)) {
            Flash::error('Kategori not found');

            return redirect(route('kategoris.index'));
        }

        return view('kategoris.edit')->with('kategori', $kategori);
    }

    /**
     * Update the specified kategori in storage.
     *
     * @param  int              $id
     * @param UpdatekategoriRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatekategoriRequest $request)
    {
        $kategori = $this->kategoriRepository->findWithoutFail($id);

        if (empty($kategori)) {
            Flash::error('Kategori not found');

            return redirect(route('kategoris.index'));
        }

        $kategori = $this->kategoriRepository->update($request->all(), $id);

        Flash::success('Kategori updated successfully.');

        return redirect(route('kategoris.index'));
    }

    /**
     * Remove the specified kategori from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $kategori = $this->kategoriRepository->findWithoutFail($id);

        if (empty($kategori)) {
            Flash::error('Kategori not found');

            return redirect(route('kategoris.index'));
        }

        $this->kategoriRepository->delete($id);

        Flash::success('Kategori deleted successfully.');

        return redirect(route('kategoris.index'));
    }
}
