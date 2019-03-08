<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatestreamRequest;
use App\Http\Requests\UpdatestreamRequest;
use App\Repositories\streamRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class streamController extends AppBaseController
{
    /** @var  streamRepository */
    private $streamRepository;

    public function __construct(streamRepository $streamRepo)
    {
        $this->streamRepository = $streamRepo;
    }

    /**
     * Display a listing of the stream.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->streamRepository->pushCriteria(new RequestCriteria($request));
        $streams = $this->streamRepository->all();

        return view('streams.index')
            ->with('streams', $streams);
    }

    /**
     * Show the form for creating a new stream.
     *
     * @return Response
     */
    public function create()
    {
        return view('streams.create');
    }

    /**
     * Store a newly created stream in storage.
     *
     * @param CreatestreamRequest $request
     *
     * @return Response
     */
    public function store(CreatestreamRequest $request)
    {
        $input = $request->all();

        $stream = $this->streamRepository->create($input);

        Flash::success('Stream saved successfully.');

        return redirect(route('streams.index'));
    }

    /**
     * Display the specified stream.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $stream = $this->streamRepository->findWithoutFail($id);

        if (empty($stream)) {
            Flash::error('Stream not found');

            return redirect(route('streams.index'));
        }

        return view('streams.show')->with('stream', $stream);
    }

    /**
     * Show the form for editing the specified stream.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $stream = $this->streamRepository->findWithoutFail($id);

        if (empty($stream)) {
            Flash::error('Stream not found');

            return redirect(route('streams.index'));
        }

        return view('streams.edit')->with('stream', $stream);
    }

    /**
     * Update the specified stream in storage.
     *
     * @param  int              $id
     * @param UpdatestreamRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatestreamRequest $request)
    {
        $stream = $this->streamRepository->findWithoutFail($id);

        if (empty($stream)) {
            Flash::error('Stream not found');

            return redirect(route('streams.index'));
        }

        $stream = $this->streamRepository->update($request->all(), $id);

        Flash::success('Stream updated successfully.');

        return redirect(route('streams.index'));
    }

    /**
     * Remove the specified stream from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $stream = $this->streamRepository->findWithoutFail($id);

        if (empty($stream)) {
            Flash::error('Stream not found');

            return redirect(route('streams.index'));
        }

        $this->streamRepository->delete($id);

        Flash::success('Stream deleted successfully.');

        return redirect(route('streams.index'));
    }
}
