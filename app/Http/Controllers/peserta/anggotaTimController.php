<?php

namespace App\Http\Controllers\peserta;

use App\Http\Requests\CreateanggitaTimRequest;
use App\Http\Requests\UpdateanggitaTimRequest;
use App\Models\anggotaTim;
use App\Http\Controllers\AppBaseController;
use App\Models\statusAnggota;
use App\Models\tim;
use App\User;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class anggotaTimController extends AppBaseController
{
    /** @var  anggitaTimRepository */
    private $anggotaTimRepository;

    public function __construct()
    {

    }

    /**
     * Display a listing of the anggitaTim.
     *
     * @param Request $request
     * @return Response
     */
    public function index($id,Request $request)
    {

        $anggotaTims = anggotaTim::where('tim_id',$id)->get();

        return view('tims.anggota_tims.index')
            ->with('anggotaTims', $anggotaTims);
    }

    /**
     * Show the form for creating a new anggitaTim.
     *
     * @return Response
     */
    public function create()
    {
        $status = statusAnggota::pluck('status_anggota','status_anggota_id');
        $peserta = User::all();
        return view('peserta.tims.anggota_tims.create', compact('status','peserta'));
    }

    public function directToForm(Request $r){
        $jum  = $r->jumlah_anggota;
        $status = statusAnggota::pluck('status_anggota','status_anggota_id');
        $peserta = User::all();
        $tim = tim::where('tim_id', $r->tim_id)->first();
        return view('peserta.tims.anggota_tims.create', compact('status','peserta','tim','jum'));
    }

    /**
     * Store a newly created anggitaTim in storage.
     *
     * @param CreateanggitaTimRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $at = anggotaTim::where('tim_id',$input['tim_id'])->where('nip',$input['nip'])->first();
        $statusKetua = anggotaTim::where('tim_id',$input['tim_id'])->where('status_anggota_id',1)->first();
        if($statusKetua){
            Flash::error('Ketua Tim Telah ada');
        }else{
            if($at){
                Flash::error('Anggota Tim Telah terdaftar');
            }else{
                anggotaTim::create($input);
            }
        }




        return redirect(route('tims.show',[$input['tim_id']]));
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
//        $anggitaTim = $this->anggitaTimRepository->findWithoutFail($id);

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
    public function edit($tim_id)
    {
        $peserta =User::all();
        $tim=tim::where('tim_id', $tim_id)->first();
        $anggotaTims = anggotaTim::where('tim_id',$tim_id)->get();
        $status = statusAnggota::all();

        return view('peserta.tims.anggota_tims.index', compact('anggotaTims','tim','peserta','status'));
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
//        $anggitaTim = $this->anggitaTimRepository->findWithoutFail($id);

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
