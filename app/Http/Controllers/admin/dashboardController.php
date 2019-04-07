<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\AppBaseController;
use App\Models\inovasi;
use App\Models\juri;
use App\Models\statusAnggota;
use App\Models\tim;
use App\User;
use Illuminate\Http\Request;
use Auth;

class dashboardController extends AppBaseController
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {

            $this->user = Auth::user();

            if($this->user['role_id'] != 1 || Auth::user() === null){
                return redirect()->back();
            }

            return $next($request);
        });

    }

   public function index(){
       $juri = juri::where('status_aktif', 1)->get();
       $inovasi_terdaftar = inovasi::all();
       $inovasi_terimplementasi = inovasi::where('status','!=', 0)->get();
       $tim = tim::all();

//       $gchart = new Echart;
//       $gchart->labels($label_tahun_asset);
//       $gchart->dataset('Total Harga', 'line', $label_harga_asset);
//       $gchart->datasets[0]->options([
//           'areaStyle' => []
//       ]);
       // dd($gchart);

       return view('admin.dashboard', compact('juri','inovasi_terimplementasi','inovasi_terdaftar','tim'));
   }

   public function  tim(){
       $tims = tim::join('anggota_tims','anggota_tims.tim_id','=','tims.tim_id')->join('users','users.nip','=','anggota_tims.nip')->get()->sortByDesc('updated_at');
       $status = statusAnggota::pluck('status_anggota','status_anggota_id');
       $peserta = User::all();
       return view('admin.tim.index', compact('tims', 'peserta','status'));

   }
}
