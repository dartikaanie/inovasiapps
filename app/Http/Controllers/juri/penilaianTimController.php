<?php

namespace App\Http\Controllers\juri;

use App\Http\Requests\CreatepenilaianTimRequest;
use App\Http\Requests\UpdatepenilaianTimRequest;
use App\Models\inovasi;
use App\Models\juri;
use App\Models\kriteraiaKategoriPenilaian;
use App\Models\penilaianInovasi;
use App\Models\penilaianTim;
use App\Models\subKriteria;
use App\Repositories\penilaianTimRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Auth;

class penilaianTimController extends AppBaseController
{
    /** @var  penilaianTimRepository */
    private $penilaianTimRepository;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {

            $this->user = Auth::user();
            $juri = juri::where('nip', Auth::user()->nip)->first();

            if (($this->user['role_id'] != 0) && ($juri == null)) {
                return redirect()->back();
            }

            return $next($request);
        });
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
        $inovasi_id = $input['inovasi_id'];

        foreach ($input['penilaian_id'] as $key => $value){

            $penilaian = penilaianTim::join('penilaian_inovasi','penilaian_inovasi.penilaian_inovasi_id','=','detail_penilaian.penilaian_inovasi_id')
                ->where('inovasi_id', $inovasi_id)
                ->where('krikat_id', $key)
                ->where('detail_penilaian.penilaian_inovasi_id', '!=',$input['penilaian_inovasi_id'])->get();

            $cekDev = 0;
            foreach ($penilaian as $p){
                $kriteria = kriteraiaKategoriPenilaian::join('sub_kriterias','sub_kriterias.sub_kriteria_id','=','kriteraia_kategori_penilaians.sub_kriteria_id')
                    ->join('kriterias','kriterias.kriteria_id','=','sub_kriterias.kriteria_id')
                    ->where('kriteraia_kategori_penilaians.kriteria_katategori_id',$key)->first();

                if($value != 0){
                    if(abs($p->nilai - $value) > 7 ){
                        Flash::error('Nilai '.$kriteria->nama_kriteria.' --- '.$kriteria->sub_kriteria.' memliki perbedaan jauh dg juri lain.');
                        $cekDev=1;
                    }else{
                        $cekDev = 0;
                    }
                }
            }

            if($cekDev == 0 && $value != 0){
                penilaianTim::create([
                    'penilaian_inovasi_id' =>$input['penilaian_inovasi_id'],
                    'krikat_id' => $key,
                    'nilai' => $value
                ]);
            }else{
                penilaianTim::create([
                    'penilaian_inovasi_id' =>$input['penilaian_inovasi_id'],
                    'krikat_id' => $key
                ]);
            }
        }


        $penilaianInovasi = penilaianInovasi::where('penilaian_inovasi_id', $input['penilaian_inovasi_id'])->first();
        $penilaianInovasi->update([
            'saran' => $input['saran']
        ]);




        Flash::success('Penilaian Inovasi berhasil disimpan');

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

            $penilaian = penilaianTim::join('penilaian_inovasi','penilaian_inovasi.penilaian_inovasi_id','=','detail_penilaian.penilaian_inovasi_id')
                ->where('inovasi_id', $id)
                ->where('krikat_id', $key)
                ->where('detail_penilaian.penilaian_inovasi_id', '!=',$input['penilaian_inovasi_id'])->get();

            $cekDev = 0;
            foreach ($penilaian as $p){
                $kriteria = kriteraiaKategoriPenilaian::join('sub_kriterias','sub_kriterias.sub_kriteria_id','=','kriteraia_kategori_penilaians.sub_kriteria_id')
                                                        ->join('kriterias','kriterias.kriteria_id','=','sub_kriterias.kriteria_id')
                                                        ->where('kriteraia_kategori_penilaians.kriteria_katategori_id',$key)->first();

                if(abs($p->nilai - $value) > 7 && $value!=0){
                    Flash::error('Nilai '.$kriteria->nama_kriteria.'-'.$kriteria->sub_kriteria.' memliki perbedaan jauh dg juri lain.');
                    $cekDev=1;
                }else{
                    $cekDev = 0;
                }
            }

            $penilaian = penilaianTim::where('penilaian_inovasi_id', $input['penilaian_inovasi_id'])->where('krikat_id',$key)->first();
            if($cekDev == 0){
                $penilaian->update([
                    'penilaian_inovasi_id' =>$input['penilaian_inovasi_id'],
                    'krikat_id' => $key,
                    'nilai' => $value
                ]);
            }else{
                $penilaian->update([
                    'penilaian_inovasi_id' =>$input['penilaian_inovasi_id'],
                    'krikat_id' => $key,
                    'nilai' => 0
                ]);
            }
        }
        $penilaianInovasi = penilaianInovasi::where('penilaian_inovasi_id', $input['penilaian_inovasi_id'])->first();
        $penilaianInovasi->update([
            'saran' => $input['saran']
        ]);



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

    public function kunciNilai($penilaian_inovasi_id){
        $penilaianInovasi = penilaianInovasi::find($penilaian_inovasi_id);
        $penilaianInovasi->update([
            'status_penilaian' => 1
        ]);

        $inovasi = inovasi::where('inovasi_id', $penilaianInovasi->inovasi_id)->first();
        $juri = juri::where('stream_id', $inovasi->stream_id )->get();
        $penilaian = penilaianInovasi::where('inovasi_id',$penilaianInovasi->inovasi_id )->get();
        if(count($juri) == count($penilaian)){
            $inovasi->update([
                'status' => 4
            ]);
        }
        return redirect(action('juri\inovasiJuriController@show',$penilaianInovasi->inovasi_id));
    }
    public function showNilai($inovasi_id){
        $inovasi = inovasi::find($inovasi_id);
        $penilaian = penilaianInovasi::where('inovasi_id', $inovasi_id)->get();
        $kitkats = kriteraiaKategoriPenilaian::where('sub_kategori_id',$inovasi->sub_kategori_id)->get();
        $kriterias = [];
        $i=0;
        foreach ($kitkats as $kit){
            if($i==0){
                $kriterias[$i] = $kit->subKriterias->kriterias->nama_kriteria;
                $i++;
            }else{
                if($kriterias[$i-1] != $kit->subKriterias->kriterias->nama_kriteria){
                    $kriterias[$i] = $kit->subKriterias->kriterias->nama_kriteria;
                    $i++;
                }
            }
        }

        $penilaiansDetail = penilaianTim::join('penilaian_inovasi','penilaian_inovasi.penilaian_inovasi_id','=','detail_penilaian.penilaian_inovasi_id')
            ->join('inovasis','inovasis.inovasi_id','=','penilaian_inovasi.inovasi_id')
            ->where('penilaian_inovasi.inovasi_id',$inovasi_id)->get();

        $totalAll=[]; $all=0;
        foreach ($penilaian as $nilai){
            $total=0;
            $pd =penilaianTim::where('penilaian_inovasi_id', $nilai->penilaian_inovasi_id)->get();
            foreach ($pd as $nilaiKri){
                $total = $total + $nilaiKri->nilai;
            }
            $totalAll[$nilai->nip_juri] = $total;
            $all = $all + $total;
        }

        return view('juri.list_inovasis_nilai.show', compact('inovasi','penilaian','kriterias','kitkats','penilaiansDetail','totalAll','all'));
    }

}
