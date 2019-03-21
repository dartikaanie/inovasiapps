<?php

namespace App\Http\Controllers\juri;

use App\Http\Requests\CreatepenilaianTimRequest;
use App\Http\Requests\UpdatepenilaianTimRequest;
use App\Models\inovasi;
use App\Models\penilaianTim;
use App\Repositories\penilaianTimRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class penilaianTimController extends AppBaseController
{
    /** @var  penilaianTimRepository */
    private $penilaianTimRepository;

    public function __construct(penilaianTimRepository $penilaianTimRepo)
    {
        $this->penilaianTimRepository = $penilaianTimRepo;
    }

    /**
     * Display a listing of the penilaianTim.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->penilaianTimRepository->pushCriteria(new RequestCriteria($request));
        $penilaianTims = $this->penilaianTimRepository->all();

        return view('penilaian_tims.index')
            ->with('penilaianTims', $penilaianTims);
    }

    /**
     * Show the form for creating a new penilaianTim.
     *
     * @return Response
     */
    public function create()
    {
        return view('penilaian_tims.create');
    }

    /**
     * Store a newly created penilaianTim in storage.
     *
     * @param CreatepenilaianTimRequest $request
     *
     * @return Response
     */
    public function store(CreatepenilaianTimRequest $request)
    {
        $input = $request->all();

        foreach ($input['penilaian_id'] as $key => $value){

            penilaianTim::create([
                'inovasi_id' =>$input['inovasi_id'],
                'nip_juri' =>$input['nip_juri'],
                'krikat_id' => $key,
                'nilai' => $value
            ]);
        }
        $inovasi_id = $input['inovasi_id'];



        Flash::success('Penilaian Tim saved successfully.');

        return redirect(action('juri\inovasiJuriController@show',$inovasi_id));
    }

    /**
     * Display the specified penilaianTim.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $penilaianTim = $this->penilaianTimRepository->findWithoutFail($id);

        if (empty($penilaianTim)) {
            Flash::error('Penilaian Tim not found');

            return redirect(route('penilaianTims.index'));
        }

        return view('penilaian_tims.show')->with('penilaianTim', $penilaianTim);
    }

    /**
     * Show the form for editing the specified penilaianTim.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $penilaianTim = $this->penilaianTimRepository->findWithoutFail($id);

        if (empty($penilaianTim)) {
            Flash::error('Penilaian Tim not found');

            return redirect(route('penilaianTims.index'));
        }

        return view('penilaian_tims.edit')->with('penilaianTim', $penilaianTim);
    }

    /**
     * Update the specified penilaianTim in storage.
     *
     * @param  int              $id
     * @param UpdatepenilaianTimRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatepenilaianTimRequest $request)
    {
        $input = $request->all();



        foreach ($input['penilaian_id'] as $key => $value){
            $penilaian = penilaianTim::where('inovasi_id', $id)->where('krikat_id',$key)->first();
            $penilaian->update([
                'inovasi_id' =>$input['inovasi_id'],
                'nip_juri' =>$input['nip_juri'],
                'krikat_id' => $key,
                'nilai' => $value
            ]);
        }
        $inovasi_id = $input['inovasi_id'];

        Flash::success('Penilaian Tim updated successfully.');

        return redirect(action('juri\inovasiJuriController@show',$id));
    }

    /**
     * Remove the specified penilaianTim from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $penilaianTim = $this->penilaianTimRepository->findWithoutFail($id);

        if (empty($penilaianTim)) {
            Flash::error('Penilaian Tim not found');

            return redirect(route('penilaianTims.index'));
        }

        $this->penilaianTimRepository->delete($id);

        Flash::success('Penilaian Tim deleted successfully.');

        return redirect(route('penilaianTims.index'));
    }

    public function kunciNilai($inovasi_id){
        $inovasi = inovasi::find($inovasi_id);
        $inovasi->update([
            'status_penilaian' => 1
        ]);

        return redirect(action('juri\inovasiJuriController@show',$inovasi_id));
    }
}
