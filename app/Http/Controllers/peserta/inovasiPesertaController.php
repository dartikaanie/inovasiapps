<?php

namespace App\Http\Controllers\peserta;

use App\Models\inovasi;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Auth;
use DB;

class inovasiPesertaController extends AppBaseController
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
            if($this->user['role_id'] != 0 ){
                return redirect()->back();
            }
            return $next($request);
        });
    }

    public function index()
    {
//        $inovasis = DB::select('Select * from inovasis join anggota_tims on anggota_tims.tim_id = inovasis.tim_id where anggota_tims.nip = ?',[Auth::user()->nip]);
      $inovasis = inovasi::join('anggota_tims','anggota_tims.tim_id','=','inovasis.tim_id')
                            ->join('tims','tims.tim_id','=','inovasis.tim_id')
                            ->where('anggota_tims.nip',Auth::user()->nip)->get();
        return view('peserta.list_inovasi_peserta.index', compact('inovasis'));
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
        //
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
}
