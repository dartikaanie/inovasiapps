<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatetimRequest;
use App\Http\Requests\UpdatetimRequest;
use App\Repositories\timRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class timController extends AppBaseController
{
    /** @var  timRepository */
    private $timRepository;

    public function __construct(timRepository $timRepo)
    {
        $this->timRepository = $timRepo;
    }

    /**
     * Display a listing of the tim.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->timRepository->pushCriteria(new RequestCriteria($request));
        $tims = $this->timRepository->all();

        return view('tims.index')
            ->with('tims', $tims);
    }

    /**
     * Show the form for creating a new tim.
     *
     * @return Response
     */
    public function create()
    {
        return view('tims.create');
    }

    /**
     * Store a newly created tim in storage.
     *
     * @param CreatetimRequest $request
     *
     * @return Response
     */
    public function store(CreatetimRequest $request)
    {
        $input = $request->all();

        $tim = $this->timRepository->create($input);

        Flash::success('Tim saved successfully.');

        return redirect(route('tims.index'));
    }

    /**
     * Display the specified tim.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tim = $this->timRepository->findWithoutFail($id);

        if (empty($tim)) {
            Flash::error('Tim not found');

            return redirect(route('tims.index'));
        }

        return view('tims.show')->with('tim', $tim);
    }

    /**
     * Show the form for editing the specified tim.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tim = $this->timRepository->findWithoutFail($id);

        if (empty($tim)) {
            Flash::error('Tim not found');

            return redirect(route('tims.index'));
        }

        return view('tims.edit')->with('tim', $tim);
    }

    /**
     * Update the specified tim in storage.
     *
     * @param  int              $id
     * @param UpdatetimRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetimRequest $request)
    {
        $tim = $this->timRepository->findWithoutFail($id);

        if (empty($tim)) {
            Flash::error('Tim not found');

            return redirect(route('tims.index'));
        }

        $tim = $this->timRepository->update($request->all(), $id);

        Flash::success('Tim updated successfully.');

        return redirect(route('tims.index'));
    }

    /**
     * Remove the specified tim from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tim = $this->timRepository->findWithoutFail($id);

        if (empty($tim)) {
            Flash::error('Tim not found');

            return redirect(route('tims.index'));
        }

        $this->timRepository->delete($id);

        Flash::success('Tim deleted successfully.');

        return redirect(route('tims.index'));
    }
}
