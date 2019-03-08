<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateanggitaTimRequest;
use App\Http\Requests\UpdateanggitaTimRequest;
use App\Repositories\anggitaTimRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class anggotaTimController extends AppBaseController
{
    /** @var  anggitaTimRepository */
    private $anggitaTimRepository;

    public function __construct(anggitaTimRepository $anggitaTimRepo)
    {
        $this->anggitaTimRepository = $anggitaTimRepo;
    }

    /**
     * Display a listing of the anggitaTim.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->anggitaTimRepository->pushCriteria(new RequestCriteria($request));
        $anggitaTims = $this->anggitaTimRepository->all();

        return view('anggita_tims.index')
            ->with('anggitaTims', $anggitaTims);
    }

    /**
     * Show the form for creating a new anggitaTim.
     *
     * @return Response
     */
    public function create()
    {
        return view('anggita_tims.create');
    }

    /**
     * Store a newly created anggitaTim in storage.
     *
     * @param CreateanggitaTimRequest $request
     *
     * @return Response
     */
    public function store(CreateanggitaTimRequest $request)
    {
        $input = $request->all();

        $anggitaTim = $this->anggitaTimRepository->create($input);

        Flash::success('Anggita Tim saved successfully.');

        return redirect(route('anggitaTims.index'));
    }

    /**
     * Display the specified anggitaTim.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $anggitaTim = $this->anggitaTimRepository->findWithoutFail($id);

        if (empty($anggitaTim)) {
            Flash::error('Anggita Tim not found');

            return redirect(route('anggitaTims.index'));
        }

        return view('anggita_tims.show')->with('anggitaTim', $anggitaTim);
    }

    /**
     * Show the form for editing the specified anggitaTim.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $anggitaTim = $this->anggitaTimRepository->findWithoutFail($id);

        if (empty($anggitaTim)) {
            Flash::error('Anggita Tim not found');

            return redirect(route('anggitaTims.index'));
        }

        return view('anggita_tims.edit')->with('anggitaTim', $anggitaTim);
    }

    /**
     * Update the specified anggitaTim in storage.
     *
     * @param  int              $id
     * @param UpdateanggitaTimRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateanggitaTimRequest $request)
    {
        $anggitaTim = $this->anggitaTimRepository->findWithoutFail($id);

        if (empty($anggitaTim)) {
            Flash::error('Anggita Tim not found');

            return redirect(route('anggitaTims.index'));
        }

        $anggitaTim = $this->anggitaTimRepository->update($request->all(), $id);

        Flash::success('Anggita Tim updated successfully.');

        return redirect(route('anggitaTims.index'));
    }

    /**
     * Remove the specified anggitaTim from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $anggitaTim = $this->anggitaTimRepository->findWithoutFail($id);

        if (empty($anggitaTim)) {
            Flash::error('Anggita Tim not found');

            return redirect(route('anggitaTims.index'));
        }

        $this->anggitaTimRepository->delete($id);

        Flash::success('Anggita Tim deleted successfully.');

        return redirect(route('anggitaTims.index'));
    }
}
