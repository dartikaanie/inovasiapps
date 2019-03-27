<?php

namespace App\Http\Controllers\peserta;

use App\Http\Requests\CreateinovasiRequest;
use App\Http\Requests\UpdateinovasiRequest;
use App\Models\anggotaTim;
use App\Models\inovasi;
use App\Models\subKategori;
use App\Models\tim;
use App\Repositories\inovasiRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
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
            if($this->user['role_id'] != 1 ){
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
        return view('peserta.inovasis.create',compact('tim','sub'));
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

        return redirect( route('inovasis.edit', [$inovasi->inovasi_id]));
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

        if (empty($inovasi)) {
            Flash::error('Inovasi not found');

            return redirect(route('inovasis.index'));
        }

        return view('peserta.inovasis.show')->with('inovasi', $inovasi);
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

        if (empty($inovasi)) {
            Flash::error('Inovasi not found');

            return redirect(route('inovasis.index'));
        }

        return view('peserta.inovasis.edit', compact('inovasi', 'anggota'));
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
              $filename = $tahun . '_' . $inovasi->tim_id . '_' . $inovasi->inovasi_id . '_' . $inovasi->judul . '.' . $file->getClientOriginalExtension();
              $file->move('dokumen_tim/', $filename);
              $input['dokumen_tim'] = $filename;
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
        $inovasi = $this->inovasiRepository->findWithoutFail($id);

        if (empty($inovasi)) {
            Flash::error('Inovasi not found');

            return redirect(route('tims.show',[$inovasi->tim_id]));
        }

        $this->inovasiRepository->delete($id);

        Flash::success('Inovasi deleted successfully.');

        return redirect(route('tims.show',[$inovasi->tim_id]));
    }

    public function editStatus ($id, Request $r){
       $update = $r->all();
       $inovasi = inovasi::where('inovasi_id', $id)->first();
       if( ($inovasi->latar_belakang != null) &&
           ($inovasi->tujuan_inovasi != null) &&
           ($inovasi->saving != 0) &&
           ($inovasi->opp_lost != 0) &&
           ($inovasi->revenue != null) &&
           ($inovasi->dokumen_tim != null) &&
           ($inovasi->judul != null)) {

           $inovasi->update($update);
           Flash::success('status implementasi inovasi berhasil diubah');
       }else{
           Flash::error('pengisian form belum lengkap');
       }

       return redirect(route('inovasis.show',[$inovasi->inovasi_id]));
    }
}
