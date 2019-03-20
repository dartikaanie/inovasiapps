<?php

namespace App\Http\Controllers\peserta;

use App\Http\Requests\CreatetimRequest;
use App\Http\Requests\UpdatetimRequest;
use App\Models\anggotaTim;
use App\Models\inovasi;
use App\Models\kendala;
use App\Models\statusAnggota;
use App\Models\tim;
use App\Repositories\timRepository;
use App\Http\Controllers\AppBaseController;
use App\User;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Auth;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use DB;

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
//        $tims = DB::select("select * from  tims join anggota_tims on tims.tim_id = anggota_tims.tim_id join users on users.nip = anggota_tims.nip WHERE users.nip = ?",[Auth::user()->nip]);
//        $anggota_tims = anggotaTim::where('nip', Auth::user()->nip);
        $tims = tim::join('anggota_tims','anggota_tims.tim_id','=','tims.tim_id')->join('users','users.nip','=','anggota_tims.nip')->where('anggota_tims.nip', Auth::user()->nip)->get();
        $status = statusAnggota::pluck('status_anggota','status_anggota_id');
        $peserta = User::all();

        return view('peserta.tims.index', compact('tims', 'peserta','status'));
    }

    /**
     * Show the form for creating a new tim.
     *
     * @return Response
     */
    public function create()
    {
        $nip = Auth::user()->nip;
        return view('peserta.tims.create',compact('nip'));
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
        $timL = tim::all()->last();

        anggotaTim::create([
           'nip' => $request->nip,
            'tim_id' => $timL->tim_id,
            'status_anggota_id' => 1
        ]);

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
        $inovasis = inovasi::where('tim_id', $tim->tim_id)->get();
        $stat_ketua = statusAnggota::where('status_anggota', 'Ketua')->first();
        $stat_fasilitator = statusAnggota::where('status_anggota', 'Fasilitator')->first();
        $ketua = anggotaTim::where('tim_id', $tim->tim_id)->where('status_anggota_id', $stat_ketua->status_anggota_id )->first();
        $fasilitator = anggotaTim::where('tim_id', $tim->tim_id)->where('status_anggota_id', $stat_fasilitator->status_anggota_id )->first();
        $anggota = anggotaTim::where('tim_id', $tim->tim_id)->get();
        $kendalas = kendala::join('inovasis','inovasis.inovasi_id','=','kendalas.inovasi_id')
                            ->join('tims','tims.tim_id','=','inovasis.tim_id')
                            ->get();

        if (empty($tim)) {
            Flash::error('Tim not found');

            return redirect(route('tims.index'));
        }

        return view('peserta.tims.show', compact('tim','inovasis','ketua','fasilitator','anggota','kendalas'));
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
