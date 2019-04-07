<?php

namespace App\Http\Controllers\juri;

use App\Http\Controllers\AppBaseController;
use App\Models\inovasi;
use App\Models\juri;
use App\Models\kriteraiaKategoriPenilaian;
use App\Models\kriteria;
use App\Models\penilaianInovasi;
use App\Models\penilaianTim;
use App\Models\subKriteria;
use Illuminate\Http\Request;
use Auth;

class inovasiJuriController extends AppBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware(function ($request, $next) {

            $this->user = Auth::user();
            $juri = juri::where('nip',Auth::user()->nip)->first();


            if($this->user['role_id'] != 0 || $juri == null){
                return redirect()->back();
            }

            return $next($request);
        });
    }

    public function index()
    {
        $data_inovasi = inovasi::where('status', 3)
                ->where('stream_id', Auth::user()->juris->stream_id)
                ->where('stream_id', '!=',null);

        $inovasis = $data_inovasi->get();


        $inovBelum = $data_inovasi->join('penilaian_inovasi','penilaian_inovasi.inovasi_id','=','inovasis.inovasi_id')
                                   ->where('penilaian_inovasi.status_penilaian',0)
                                   ->where('nip_juri',Auth::user()->nip)->get();



        $inovSudah= inovasi::where('status', 3)
                            ->where('stream_id', Auth::user()->juris->stream_id)
                            ->where('stream_id', '!=',null)
                            ->join('penilaian_inovasi','penilaian_inovasi.inovasi_id','=','inovasis.inovasi_id')
                            ->where('penilaian_inovasi.status_penilaian',1)
                            ->where('nip_juri',Auth::user()->nip)->get();

        $inovBelumPenilaian = inovasi::where('status', 3)
                                    ->where('stream_id', Auth::user()->juris->stream_id)
                                    ->where('stream_id', '!=',null)
                                    ->whereNotIn('inovasi_id', function ($query){
                                        $query->select('inovasi_id')->from('penilaian_inovasi')
                                        ->where('nip_juri',Auth::user()->nip);})
                                    ->get();


        foreach ($inovBelumPenilaian as $inovasi){
            $penilaianInovasi= penilaianInovasi::where('inovasi_id', $inovasi->inovasi_id)
                                                ->where('nip_juri', Auth::user()->nip)->first();

            if(empty($penilaianInovasi)){
                penilaianInovasi::create([
                    'inovasi_id' => $inovasi->inovasi_id,
                    'nip_juri' => Auth::user()->nip
                ]);
            }
        }


        return view('juri.inovasi_juri.index', compact('inovasis','inovBelum','inovSudah'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inovasi = inovasi::where('inovasi_id', $id)->first();
        $juri = Auth::user()->nip;



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

        $penilaianInovasi= penilaianInovasi::where('inovasi_id', $id)
                                            ->where('nip_juri', Auth::user()->nip)->first();


        $penilaians = penilaianTim::where('penilaian_inovasi_id', $penilaianInovasi->penilaian_inovasi_id)->get();
        $total =0;
        foreach ($penilaians as $penilaian) {
            $total = $total + $penilaian->nilai;
        }

        return view('juri.inovasi_juri.show', compact('inovasi', 'kitkats','kriterias','i','juri','penilaians' ,'total','penilaianInovasi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public  function showPenilaian($id){
        $inovasi = inovasi::where('inovasi_id', $id)->first();

        return view('juri.inovasi_juri.show_penilaian', compact('inovasi'));
    }
}
