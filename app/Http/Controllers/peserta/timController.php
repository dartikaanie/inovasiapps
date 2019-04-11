<?php

namespace App\Http\Controllers\peserta;


use App\Http\Requests\CreatetimRequest;
use App\Http\Requests\UpdatetimRequest;
use App\Models\anggotaTim;
use App\Models\departemen;
use App\Models\inovasi;
use App\Models\kendala;
use App\Models\statusAnggota;
use App\Models\tim;
use App\Models\unitBiro;
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
     * Display a listing of the tim.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
       $tims = tim::join('anggota_tims','anggota_tims.tim_id','=','tims.tim_id')->join('users','users.nip','=','anggota_tims.nip')->where('anggota_tims.nip', Auth::user()->nip)->get()->sortByDesc('updated_at');
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
        $user = Auth::user();
        $departemen = unitBiro::where('kd_level','DEPT')->pluck('nama', 'kode');
        return view('peserta.tims.create',compact('user','departemen'));
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
        tim::create($input);
        $timL = tim::all()->last();

        anggotaTim::create([
           'nip' => $request->nip,
            'tim_id' => $timL->tim_id,
            'status_anggota_id' => 3
        ]);


        Flash::success('Tim saved successfully.');
        return redirect(url('tambahInovasi/'.$timL->tim_id));

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
        $tim = tim::find($id);
        $inovasis = inovasi::where('tim_id', $tim->tim_id)->get();
        $stat_ketua = statusAnggota::where('status_anggota', 'Ketua')->first();
        $ketua = anggotaTim::where('tim_id', $tim->tim_id)->where('status_anggota_id', $stat_ketua->status_anggota_id )->first();
        $anggota = anggotaTim::where('tim_id', $tim->tim_id)->get();
        $kendalas = kendala::join('inovasis','inovasis.inovasi_id','=','kendalas.inovasi_id')
                            ->join('tims','tims.tim_id','=','inovasis.tim_id')
                            ->where('tims.tim_id',$tim->tim_id)
                                ->where('inovasis.deleted_at',null)
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
        $tim = tim::find($id);
        $nip = Auth::user()->nip;
        if (empty($tim)) {
            Flash::error('Tim not found');

            return redirect(route('tims.index'));
        }
        $departemen = departemen::pluck('departemen', 'departemen_id');
        return view('peserta.tims.edit', compact('tim','nip','departemen'));
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
        $tim = tim::find($id);

        if (empty($tim)) {
            Flash::error('Tim not found');

            return redirect(route('tims.index'));
        }

        $tim->update($request->all());

        Flash::success('Tim updated successfully.');

        return redirect(route('tims.show',[$tim->tim_id]));
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
        $tim = tim::find($id);

        if (empty($tim)) {
            Flash::error('Tim not found');

            return redirect(route('tims.index'));
        }

        $tim->delete($id);

        Flash::success('Tim deleted successfully.');

        return redirect(route('tims.index'));
    }
}
