<?php

namespace App\Http\Controllers\peserta;

use App\Http\Requests\CreateinovasiRequest;
use App\Http\Requests\UpdateinovasiRequest;
use App\Models\anggotaTim;
use App\Models\areaImplementasi;
use App\Models\inovasi;
use App\Models\statusAnggota;
use App\Models\subKategori;
use App\Models\tim;
use App\Repositories\inovasiRepository;
use App\Http\Controllers\AppBaseController;
use App\User;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Auth;

class inovasiController extends AppBaseController
{
    /** @var  inovasiRepository */
    private $inovasiRepository;

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
     * Display a listing of the inovasi.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->inovasiRepository->pushCriteria(new RequestCriteria($request));
        $inovasis = $this->inovasiRepository->all();

        return view('peserta.inovasis.index')
            ->with('inovasis', $inovasis);
    }

    /**
     * Show the form for creating a new inovasi.
     *
     * @return Response
     */
    public function create($tim_id)
    {
        $tim = tim::where('tim_id', $tim_id)->first();
        $sub = subKategori::pluck('nama_sub_kategori','sub_kategori_id');
        $area = areaImplementasi::pluck('area_implementasi','area_implementasi_id');
        return view('peserta.inovasis.create',compact('tim','sub','area'));
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

        $inovasi = inovasi::create($input);

        Flash::success('Inovasi saved successfully.');

//        return redirect( route('inovasis.edit', [$inovasi->inovasi_id]));
        return redirect( route('addAnggota', [$input['jum'], $inovasi->inovasi_id]));

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
        $inovasi = inovasi::find($id);
        $anggota = anggotaTim::where('tim_id', $inovasi->tim_id)->get();

        if (empty($inovasi)) {
            Flash::error('Inovasi not found');

            return redirect(route('inovasis.index'));
        }

        return view('peserta.inovasis.show', compact('inovasi', 'anggota'));
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
        $inovasi = inovasi::find($id);
        $anggota = anggotaTim::where('tim_id', $inovasi->tim_id)->join('users','users.nip','=','anggota_tims.nip')->pluck('users.nama','users.nip');
        $area = areaImplementasi::pluck('area_implementasi','area_implementasi_id');
        $tim =tim::where('tim_id', $inovasi->tim_id)->first();
        $users = User::all();
        if (empty($inovasi)) {
            Flash::error('Inovasi not found');

            return redirect(route('inovasis.index'));
        }

        return view('peserta.inovasis.edit', compact('inovasi', 'anggota','area','tim','users'));
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

        $inovasi = inovasi::find($id);

        $input = $request->all();
        if($request->hasFile('dokumen_tim')) {
           $file = $request->file('dokumen_tim');
           if($file->getClientOriginalExtension() == "pdf") {
              $tahun = date_format(date_create($inovasi->created_at), 'Y');
              $filename = $tahun . '_' . $inovasi->tim_id . '_' . $inovasi->inovasi_id . '_' . substr($inovasi->judul,0,20) . '.' . $file->getClientOriginalExtension();
              $file->move('dokumen_tim/'.$tahun, $filename);
              $input['dokumen_tim'] = $tahun.'/'.$filename;
            }else{
                    $input['dokumen_tim']=null;
                    Flash::error('Dokumen tim harus .pdf');
           }
        }
        else {
            if (!$inovasi->dokumen_tim) {
                $input['dokumen_tim'] = null;
            } else {
                $input['dokumen_tim'] = $inovasi->dokumen_tim;
            }
        }

        if($request->hasFile('dokumen_pendukung')) {
                $file = $request->file('dokumen_pendukung');
                $tahun = date_format(date_create($inovasi->created_at),'Y');
                $filename = 'P_'.$tahun.'_'.$inovasi->tim_id . '_' . $inovasi->inovasi_id . '_' . $file->getClientOriginalExtension();
                $file->move('dokumen_pendukung/', $filename);
                $input['dokumen_pendukung'] = $filename;
        }else{
            if($inovasi->dokumen_pendukung)
            {
                $input['dokumen_pendukung']=$inovasi->dokumen_pendukung;
            }else{
                $input['dokumen_pendukung']= null;
            }
        }




        if (empty($inovasi)) {
            Flash::error('Inovasi not found');

            return redirect(route('inovasis.index'));
        }


        $inovasi->update($input);

        Flash::success('Inovasi updated successfully.');

        return redirect(route('inovasis.show', [$inovasi->inovasi_id]));
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
        $inovasi = inovasi::find($id);

        if (empty($inovasi)) {
            Flash::error('Inovasi not found');

            return redirect(route('tims.show',[$inovasi->tim_id]));
        }

        $inovasi->delete($id);

        Flash::success('Inovasi deleted successfully.');

        return redirect(route('tims.show',[$inovasi->tim_id]));
    }

    public function editStatus ($id, Request $r){
       $update = $r->all();
       $inovasi = inovasi::where('inovasi_id', $id)->first();

        $anggota = anggotaTim::where('tim_id',$inovasi->tim_id)->where('status_anggota_id',1)->first();
        $userLogin = anggotaTim::where('tim_id',$inovasi->tim_id)->where('nip',auth::user()->nip)->first();

        if( ($inovasi->latar_belakang != null) &&
           ($inovasi->tujuan_inovasi != null) &&
           ($inovasi->saving != 0) &&
           ($inovasi->opp_lost != 0) &&
           ($inovasi->revenue != null) &&
           ($inovasi->dokumen_tim != null) &&
           ($inovasi->nip_inisiator != null) &&
           ($inovasi->judul != null)) {
            if($userLogin != null){
                if($anggota != null){
                    if($update['status'] == 'Ajukan'){
                        $inovasi->update(['status' => '1']);
                    }else{
                        $inovasi->update(['status' => '0']);
                    }

                    Mail::send('email', ['nama' => $anggota->users->nama, 'inovasi' => $inovasi], function ($message) use ($inovasi, $anggota) {
                        $message->subject("Inovasi Semen Padang -".$anggota->users->nama);
                        $message->from($anggota->users->nama.'@SEMENINDONESIA.COM', $anggota->users->nama);
                        $message->to('pengelolainovasi.sp@SEMENINDONESIA.COM');
                    });
                    Flash::success('status implementasi inovasi berhasil diubah');

                }else{
                    Flash::error('Ketua tim belum ada');
                }
            }else{
                Flash::error('Anda belum tergabng dalam tim ini');
            }
       }else{
           Flash::error('pengisian form belum lengkap');
       }


//        Mail::send('email', ['nama' => $anggota->users->nama, 'inovasi' => $inovasi], function ($message) use ($inovasi, $anggota) {
//            $message->subject("Inovasi SP -".$inovasi->judul);
//            $message->from($anggota->users->email, $inovasi->users->nama);
//            $message->to('inovasisp19@gmail.com');
//        });


       return redirect(route('inovasis.show',[$inovasi->inovasi_id]));
    }

    public function sendEmail($inovasi)
    {
        try {
            Mail::send('email', ['nama' => $inovasi->users->nama, 'pesan' => "ini Pesan"], function ($message) use ($inovasi) {
                $message->subject($inovasi->judul);
                $message->from('donotreply@kiddy.com', 'Kiddy');
                $message->to('pbd2018@gmail.com');
            });
            return back()->with('alert-success', 'Berhasil Kirim Email');
        } catch (Exception $e) {
            return response(['status' => false, 'errors' => $e->getMessage()]);
        }
    }

    public function addAnggota ($jum, $inovasi){
        $inov=inovasi::find($inovasi);
        $inovasi_id = $inov->inovasi_id;
        $status = statusAnggota::pluck('status_anggota','status_anggota_id');
        $peserta = User::all();
        $tim = tim::where('tim_id', $inov->tim_id)->first();
        return view('peserta.inovasis.anggota_tims.create', compact('status','peserta','tim','jum','inovasi_id'));
    }

    public function storeAnggota (Request $request)
    {
        $input = $request->all();
        $jum =$input['jum'];
        while( $jum>0) {
            $at = anggotaTim::where('tim_id', $input['tim_id'])->where('nip', $input['nip'][$jum])->first();

            if($at!=null){
                Flash::warning( $at->Users->nama.' Telah terdaftar');
            }else{
                $statusKetua = anggotaTim::where('tim_id', $input['tim_id'])->where('status_anggota_id', 1)->first();
                if( $input['status_anggota_id'][$jum] == 1){
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

        $inovasi_id =$input['inovasi_id'];
        return redirect( route('inovasis.edit', [$inovasi_id]));
//        return redirect(route('tims.show',[$input['tim_id']]));
    }


    public function areaAdd(Request $request){
        $input = $request->all();
        $area = strtoupper($request->area_implementasi);
        areaImplementasi::create([
            'area_implementasi' => $area ]);
        return Redirect::back();
    }

}
