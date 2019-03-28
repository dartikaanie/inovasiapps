<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatekendalaRequest;
use App\Http\Requests\UpdatekendalaRequest;
use App\Models\kendala;
use App\Repositories\kendalaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Auth;

class kendalaController extends AppBaseController
{
    /** @var  kendalaRepository */
    private $kendalaRepository;

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the kendala.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
//        $this->kendalaRepository->pushCriteria(new RequestCriteria($request));
        $kendalas = kendala::all()->sortBy('solusi');

        return view('admin.kendalas.index')
            ->with('kendalas', $kendalas);
    }

    /**
     * Show the form for creating a new kendala.
     *
     * @return Response
     */
    public function create()
    {
        return view('kendalas.create');
    }

    /**
     * Store a newly created kendala in storage.
     *
     * @param CreatekendalaRequest $request
     *
     * @return Response
     */
    public function store(CreatekendalaRequest $request)
    {
        $input = $request->all();

        $kendala = $this->kendalaRepository->create($input);

        Flash::success('Kendala saved successfully.');

        return redirect(route('inovasis.show', [$input['inovasi_id']]));
    }

    /**
     * Display the specified kendala.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $kendala = kendala::find($id);

        if (empty($kendala)) {
            Flash::error('Kendala not found');

            return redirect(route('kendalas.index'));
        }

        return view('admin.kendalas.show')->with('kendala', $kendala);
    }

    /**
     * Show the form for editing the specified kendala.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $kendala = $this->kendalaRepository->findWithoutFail($id);

        if (empty($kendala)) {
            Flash::error('Kendala not found');

            return redirect(route('kendalas.index'));
        }

        return view('kendalas.edit')->with('kendala', $kendala);
    }

    /**
     * Update the specified kendala in storage.
     *
     * @param  int              $id
     * @param UpdatekendalaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatekendalaRequest $request)
    {
        $kendala = $this->kendalaRepository->findWithoutFail($id);

        if (empty($kendala)) {
            Flash::error('Kendala not found');

            return redirect(route('kendalas.index'));
        }

        $kendala = $this->kendalaRepository->update($request->all(), $id);

        Flash::success('Kendala updated successfully.');

        return redirect(route('kendalas.index'));
    }

    /**
     * Remove the specified kendala from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $kendala = $this->kendalaRepository->findWithoutFail($id);

        if (empty($kendala)) {
            Flash::error('Kendala not found');

            return redirect(route('kendalas.index'));
        }

        $this->kendalaRepository->delete($id);

        Flash::success('Kendala deleted successfully.');

        return redirect(route('kendalas.index'));
    }

    public function addSolusi($kendala_id){
        $kendala = kendala::find($kendala_id);


    }
}
