<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatekriteriaRequest;
use App\Http\Requests\UpdatekriteriaRequest;
use App\Models\kategori;
use App\Repositories\kriteriaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class kriteriaController extends AppBaseController
{
    /** @var  kriteriaRepository */
    private $kriteriaRepository;

    public function __construct(kriteriaRepository $kriteriaRepo)
    {
        $this->kriteriaRepository = $kriteriaRepo;
    }

    /**
     * Display a listing of the kriteria.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->kriteriaRepository->pushCriteria(new RequestCriteria($request));
        $kriterias = $this->kriteriaRepository->all();

        return view('kriterias.index')
            ->with('kriterias', $kriterias);
    }

    /**
     * Show the form for creating a new kriteria.
     *
     * @return Response
     */
    public function create()
    {
        $kategoris = kategori::pluck('nama_kategori','kategori_id');
        return view('kriterias.create', compact('kategoris'));
    }

    /**
     * Store a newly created kriteria in storage.
     *
     * @param CreatekriteriaRequest $request
     *
     * @return Response
     */
    public function store(CreatekriteriaRequest $request)
    {
        $input = $request->all();

        $kriteria = $this->kriteriaRepository->create($input);

        Flash::success('Kriteria saved successfully.');

        return redirect(route('kriterias.index'));
    }

    /**
     * Display the specified kriteria.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $kriteria = $this->kriteriaRepository->findWithoutFail($id);

        if (empty($kriteria)) {
            Flash::error('Kriteria not found');

            return redirect(route('kriterias.index'));
        }

        return view('kriterias.show')->with('kriteria', $kriteria);
    }

    /**
     * Show the form for editing the specified kriteria.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $kriteria = $this->kriteriaRepository->findWithoutFail($id);

        if (empty($kriteria)) {
            Flash::error('Kriteria not found');

            return redirect(route('kriterias.index'));
        }

        return view('kriterias.edit')->with('kriteria', $kriteria);
    }

    /**
     * Update the specified kriteria in storage.
     *
     * @param  int              $id
     * @param UpdatekriteriaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatekriteriaRequest $request)
    {
        $kriteria = $this->kriteriaRepository->findWithoutFail($id);

        if (empty($kriteria)) {
            Flash::error('Kriteria not found');

            return redirect(route('kriterias.index'));
        }

        $kriteria = $this->kriteriaRepository->update($request->all(), $id);

        Flash::success('Kriteria updated successfully.');

        return redirect(route('kriterias.index'));
    }

    /**
     * Remove the specified kriteria from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $kriteria = $this->kriteriaRepository->findWithoutFail($id);

        if (empty($kriteria)) {
            Flash::error('Kriteria not found');

            return redirect(route('kriterias.index'));
        }

        $this->kriteriaRepository->delete($id);

        Flash::success('Kriteria deleted successfully.');

        return redirect(route('kriterias.index'));
    }
}
