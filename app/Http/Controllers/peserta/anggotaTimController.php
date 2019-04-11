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
use Auth;

class anggotaTimController extends AppBaseController
{
    /** @var  anggitaTimRepository */
    private $anggotaTimRepository;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {

            $this->user = Auth::user();
            if($this->user['role_id'] != 0 ){
                return redirect()->back();
            }

            return $next($request);
        });
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
       $jum =$input['jum'];
        while( $jum>0) {
            $at = anggotaTim::where('tim_id', $input['tim_id'])->where('nip', $input['nip'][$jum])->first();

            if($at!=null){
                Flash::warning( $at->Users->nama.' Telah terdaftar');
            }else{
                $statusKetua = anggotaTim::where('tim_id', $input['tim_id'])->where('status_anggota_id', 1)->first();

                if( $statusKetua != null && $input['status_anggota_id'][$jum] == 1){
                    Flash::error('Ketua Tim Telah ada');
                }else{
                    anggotaTim::create([
                            'nip' => $input['nip'][$jum],
                            'tim_id' => $input['tim_id'],
                            'status_anggota_id' => $input['status_anggota_id'][$jum]
                        ]
                    );
                }
            }
            $jum--;
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

        $anggitaTim = anggotaTim::find($id);
        $tim_id = $anggitaTim->tim_id;
        $anggitaTim->delete();
        Flash::success('Anggota Tim Berhasil dihapus');


        return redirect(route('tims.show', [$tim_id]));
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
        $input = $request->all();

        $jum =$input['jum'];

        while( $jum>0) {
            $at = anggotaTim::where('anggota_tim_id', $input['anggota_tim_id'][$jum])->first();
            if($at==null){
                Flash::error( 'tidak terdaftar');
            }else{
                $statusKetua = anggotaTim::where('tim_id', $id)->where('status_anggota_id', 1)->first();
                if( $statusKetua != null && $input['status_anggota_id'][$jum] == 1){
                    Flash::error('Ketua Tim Telah ada');
                }else{
                    $at->update([
                            'nip' => $input['nip'][$jum],
                            'tim_id' => $input['tim_id'],
                            'status_anggota_id' => $input['status_anggota_id'][$jum]
                        ]
                    );
                }
            }
            $jum--;
        }



        return redirect(route('tims.show',[$input['tim_id']]));
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
