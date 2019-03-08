<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatestatusAnggotaRequest;
use App\Http\Requests\UpdatestatusAnggotaRequest;
use App\Repositories\statusAnggotaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class statusAnggotaController extends AppBaseController
{
    /** @var  statusAnggotaRepository */
    private $statusAnggotaRepository;

    public function __construct(statusAnggotaRepository $statusAnggotaRepo)
    {
        $this->statusAnggotaRepository = $statusAnggotaRepo;
    }

    /**
     * Display a listing of the statusAnggota.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->statusAnggotaRepository->pushCriteria(new RequestCriteria($request));
        $statusAnggotas = $this->statusAnggotaRepository->all();

        return view('status_anggotas.index')
            ->with('statusAnggotas', $statusAnggotas);
    }

    /**
     * Show the form for creating a new statusAnggota.
     *
     * @return Response
     */
    public function create()
    {
        return view('status_anggotas.create');
    }

    /**
     * Store a newly created statusAnggota in storage.
     *
     * @param CreatestatusAnggotaRequest $request
     *
     * @return Response
     */
    public function store(CreatestatusAnggotaRequest $request)
    {
        $input = $request->all();

        $statusAnggota = $this->statusAnggotaRepository->create($input);

        Flash::success('Status Anggota saved successfully.');

        return redirect(route('statusAnggotas.index'));
    }

    /**
     * Display the specified statusAnggota.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $statusAnggota = $this->statusAnggotaRepository->findWithoutFail($id);

        if (empty($statusAnggota)) {
            Flash::error('Status Anggota not found');

            return redirect(route('statusAnggotas.index'));
        }

        return view('status_anggotas.show')->with('statusAnggota', $statusAnggota);
    }

    /**
     * Show the form for editing the specified statusAnggota.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $statusAnggota = $this->statusAnggotaRepository->findWithoutFail($id);

        if (empty($statusAnggota)) {
            Flash::error('Status Anggota not found');

            return redirect(route('statusAnggotas.index'));
        }

        return view('status_anggotas.edit')->with('statusAnggota', $statusAnggota);
    }

    /**
     * Update the specified statusAnggota in storage.
     *
     * @param  int              $id
     * @param UpdatestatusAnggotaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatestatusAnggotaRequest $request)
    {
        $statusAnggota = $this->statusAnggotaRepository->findWithoutFail($id);

        if (empty($statusAnggota)) {
            Flash::error('Status Anggota not found');

            return redirect(route('statusAnggotas.index'));
        }

        $statusAnggota = $this->statusAnggotaRepository->update($request->all(), $id);

        Flash::success('Status Anggota updated successfully.');

        return redirect(route('statusAnggotas.index'));
    }

    /**
     * Remove the specified statusAnggota from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $statusAnggota = $this->statusAnggotaRepository->findWithoutFail($id);

        if (empty($statusAnggota)) {
            Flash::error('Status Anggota not found');

            return redirect(route('statusAnggotas.index'));
        }

        $this->statusAnggotaRepository->delete($id);

        Flash::success('Status Anggota deleted successfully.');

        return redirect(route('statusAnggotas.index'));
    }
}
