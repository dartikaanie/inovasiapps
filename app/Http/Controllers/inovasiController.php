<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateinovasiRequest;
use App\Http\Requests\UpdateinovasiRequest;
use App\Repositories\inovasiRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class inovasiController extends AppBaseController
{
    /** @var  inovasiRepository */
    private $inovasiRepository;

    public function __construct(inovasiRepository $inovasiRepo)
    {
        $this->inovasiRepository = $inovasiRepo;
    }

    /**
     * Display a listing of the inovasi.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->inovasiRepository->pushCriteria(new RequestCriteria($request));
        $inovasis = $this->inovasiRepository->all();

        return view('inovasis.index')
            ->with('inovasis', $inovasis);
    }

    /**
     * Show the form for creating a new inovasi.
     *
     * @return Response
     */
    public function create()
    {
        return view('inovasis.create');
    }

    /**
     * Store a newly created inovasi in storage.
     *
     * @param CreateinovasiRequest $request
     *
     * @return Response
     */
    public function store(CreateinovasiRequest $request)
    {
        $input = $request->all();

        $inovasi = $this->inovasiRepository->create($input);

        Flash::success('Inovasi saved successfully.');

        return redirect(route('inovasis.index'));
    }

    /**
     * Display the specified inovasi.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $inovasi = $this->inovasiRepository->findWithoutFail($id);

        if (empty($inovasi)) {
            Flash::error('Inovasi not found');

            return redirect(route('inovasis.index'));
        }

        return view('inovasis.show')->with('inovasi', $inovasi);
    }

    /**
     * Show the form for editing the specified inovasi.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $inovasi = $this->inovasiRepository->findWithoutFail($id);

        if (empty($inovasi)) {
            Flash::error('Inovasi not found');

            return redirect(route('inovasis.index'));
        }

        return view('inovasis.edit')->with('inovasi', $inovasi);
    }

    /**
     * Update the specified inovasi in storage.
     *
     * @param  int              $id
     * @param UpdateinovasiRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateinovasiRequest $request)
    {
        $inovasi = $this->inovasiRepository->findWithoutFail($id);

        if (empty($inovasi)) {
            Flash::error('Inovasi not found');

            return redirect(route('inovasis.index'));
        }

        $inovasi = $this->inovasiRepository->update($request->all(), $id);

        Flash::success('Inovasi updated successfully.');

        return redirect(route('inovasis.index'));
    }

    /**
     * Remove the specified inovasi from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $inovasi = $this->inovasiRepository->findWithoutFail($id);

        if (empty($inovasi)) {
            Flash::error('Inovasi not found');

            return redirect(route('inovasis.index'));
        }

        $this->inovasiRepository->delete($id);

        Flash::success('Inovasi deleted successfully.');

        return redirect(route('inovasis.index'));
    }
}
