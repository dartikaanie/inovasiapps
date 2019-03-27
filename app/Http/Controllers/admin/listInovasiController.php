<?php

namespace App\Http\Controllers\admin;

use App\Models\inovasi;
use App\Models\kriteraiaKategoriPenilaian;
use App\Models\penilaianInovasi;
use App\Models\penilaianTim;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Laracasts\Flash\Flash;
use Auth;

class listInovasiController extends AppBaseController
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

            if($this->user['role_id'] != 0 || Auth::user() === null){
                return redirect()->back();
            }

            return $next($request);
        });
    }

    public function index()
    {
        $inovasis = inovasi::all()->sortBy('status');
        $inovBelum =inovasi::where('status',3)->get();

        return view('admin.list_inovasis.index', compact('inovasis','inovBelum'));
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
        $inovasi = inovasi::join('streams','streams.stream_id','=','inovasis.stream_id')->where('inovasi_id', $id)->first();

        if (empty($inovasi)) {
            Flash::error('Inovasi not found');

            return redirect(route('inovasis.index'));
        }

        return view('admin.list_inovasis.show')->with('inovasi', $inovasi);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $r)
    {

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
        $input = $request->all();
        $inovasi = inovasi::where('inovasi_id', $id)->first();
        $inovasi->update($input);
        Flash::success('Status berhasil diubah');
        return redirect(route('listInovasis.show',[$inovasi->inovasi_id]));
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

    public function nilai(){
        $inovasis = inovasi::all();

        return view('admin.list_inovasis_nilai.index', compact('inovasis'));
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

        return view('admin.list_inovasis_nilai.show', compact('inovasi','penilaian','kriterias','kitkats','penilaiansDetail','totalAll','all'));
    }
}
