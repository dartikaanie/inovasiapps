<?php

namespace App\Http\Controllers\peserta;

use App\Http\Controllers\AppBaseController;
use App\Models\inovasi;
use App\Models\juri;
use App\Models\kategori;
use App\Models\tim;
use Illuminate\Http\Request;
use Auth;

class dashboardPesertaController extends AppBaseController
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {

            $this->user = Auth::user();

            if($this->user['role_id'] != 0){
                return redirect()->back();
            }

            return $next($request);
        });

    }

   public function index(){
        $user = Auth::user();
        $inovasis = inovasi::join('tims','tims.tim_id','=','inovasis.tim_id')
                            ->join('anggota_tims','anggota_tims.tim_id','=','inovasis.tim_id')
                            ->where('anggota_tims.nip', $user->nip)->get();

       $inovasisTerimplementasi = inovasi::join('tims','tims.tim_id','=','inovasis.tim_id')
           ->join('anggota_tims','anggota_tims.tim_id','=','inovasis.tim_id')
           ->where('anggota_tims.nip', $user->nip)
           ->where('inovasis.status','!=',0)->get();

       $inovasisBelum = inovasi::join('tims','tims.tim_id','=','inovasis.tim_id')
           ->join('anggota_tims','anggota_tims.tim_id','=','inovasis.tim_id')
           ->where('anggota_tims.nip', $user->nip)
           ->where('inovasis.status','==',0)->get();

       $juri = juri::where('nip',$user->nip)->where('status_aktif',1)->first();

       $kategoris = kategori::join('sub_kategoris','sub_kategoris.kategori_id','=','kategoris.kategori_id')->get();
       return view('peserta.dashboard.dashboardPeserta', compact('juri','user','inovasis','inovasisBelum','inovasisTerimplementasi','kategoris'));
   }
}
