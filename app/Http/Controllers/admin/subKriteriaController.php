<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests\CreatesubKriteriaRequest;
use App\Http\Requests\UpdatesubKriteriaRequest;
use App\Models\kriteria;
use App\Repositories\subKriteriaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class subKriteriaController extends AppBaseController
{
    /** @var  subKriteriaRepository */
    private $subKriteriaRepository;

    public function __construct(subKriteriaRepository $subKriteriaRepo)
    {
        $this->subKriteriaRepository = $subKriteriaRepo;
    }

    /**
     * Display a listing of the subKriteria.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->subKriteriaRepository->pushCriteria(new RequestCriteria($request));
        $subKriterias = $this->subKriteriaRepository->all();

        return view('sub_kriterias.index')
            ->with('subKriterias', $subKriterias);
    }

    /**
     * Show the form for creating a new subKriteria.
     *
     * @return Response
     */
    public function create()
    {
        $kriterias = kriteria::pluck('nama_kriteria', 'kriteria_id');
        return view('sub_kriterias.create', compact('kriterias'));
    }

    /**
     * Store a newly created subKriteria in storage.
     *
     * @param CreatesubKriteriaRequest $request
     *
     * @return Response
     */
    public function store(CreatesubKriteriaRequest $request)
    {
        $input = $request->all();

        $subKriteria = $this->subKriteriaRepository->create($input);

        Flash::success('Sub Kriteria saved successfully.');

        return redirect(route('subKriterias.index'));
    }

    /**
     * Display the specified subKriteria.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $subKriteria = $this->subKriteriaRepository->findWithoutFail($id);

        if (empty($subKriteria)) {
            Flash::error('Sub Kriteria not found');

            return redirect(route('subKriterias.index'));
        }

        return view('sub_kriterias.show')->with('subKriteria', $subKriteria);
    }

    /**
     * Show the form for editing the specified subKriteria.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $subKriteria = $this->subKriteriaRepository->findWithoutFail($id);

        if (empty($subKriteria)) {
            Flash::error('Sub Kriteria not found');

            return redirect(route('subKriterias.index'));
        }

        return view('kriteria.sub_kriterias.edit')->with('subKriteria', $subKriteria);
    }

    /**
     * Update the specified subKriteria in storage.
     *
     * @param  int              $id
     * @param UpdatesubKriteriaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatesubKriteriaRequest $request)
    {
        $subKriteria = $this->subKriteriaRepository->findWithoutFail($id);

        if (empty($subKriteria)) {
            Flash::error('Sub Kriteria not found');

            return redirect(route('subKriterias.index'));
        }

        $subKriteria = $this->subKriteriaRepository->update($request->all(), $id);

        Flash::success('Sub Kriteria updated successfully.');

        return redirect(route('subKriterias.index'));
    }

    /**
     * Remove the specified subKriteria from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $subKriteria = $this->subKriteriaRepository->findWithoutFail($id);

        if (empty($subKriteria)) {
            Flash::error('Sub Kriteria not found');

            return redirect(route('subKriterias.index'));
        }

        $this->subKriteriaRepository->delete($id);

        Flash::success('Sub Kriteria deleted successfully.');

        return redirect(route('subKriterias.index'));
    }
}
