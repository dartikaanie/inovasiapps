<?php

namespace App\Http\Controllers\juri;

use App\Http\Controllers\AppBaseController;
use App\Models\inovasi;
use App\Models\juri;
use App\Models\kriteraiaKategoriPenilaian;
use App\Models\kriteria;
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
    public function index()
    {

        $inovasis = inovasi::where('status_registrasi', 2)
                ->where('stream_id', Auth::user()->juris->stream_id)->get();

        $inovasi_belum = inovasi::where('status_registrasi', 2)
            ->where('stream_id', Auth::user()->juris->stream_id)
            ->where('status_penilaian', 0)->get();

        return view('juri.inovasi_juri.index', compact('inovasis','inovasi_belum'));
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

        $penilaians = penilaianTim::where('inovasi_id', $id)->get();
        $total =0;
        foreach ($penilaians as $penilaian) {
            $total = $total + $penilaian->nilai;
        }


        if (empty($inovasi)) {
            Flash::error('Inovasi not found');

            return redirect(route('inovasis.index'));
        }

        return view('juri.inovasi_juri.show', compact('inovasi', 'kitkats','kriterias','i','juri','penilaians' ,'total'));
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
