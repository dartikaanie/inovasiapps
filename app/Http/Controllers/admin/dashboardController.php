<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\AppBaseController;
use App\Models\anggotaTim;
use App\Models\inovasi;
use App\Models\juri;
use App\Models\statusAnggota;
use App\Models\tim;
use App\User;
use Illuminate\Http\Request;
use Auth;
use DB;

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
       $tim = anggotaTim::all();

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

   public function chart(){

       $inovasi= DB::select("Select count(inovasi_id) as jum, MONTH(inovasis.created_at) as bulan, kategoris.kategori_id as kategori
                                FROM inovasis JOIN sub_kategoris ON sub_kategoris.sub_kategori_id = inovasis.sub_kategori_id
                                JOIN kategoris ON kategoris.kategori_id = sub_kategoris.kategori_id
                                GROUP BY kategori, bulan");

       $data=[];

       foreach ($inovasi as $item) {
           $cek=false;

           if(count($data)>0){

               for($i=1;$i<count($data);$i++){
                   if ($data[$i]['bulan'] == $item->bulan) {
                       $cek=true;
                       if($item->kategori == 1){
                           $data[$i]['jum1'] = $item->jum;
                       }else{
                           $data[$i]['jum2'] = $item->jum;
                       }
                   }
               }
               if($cek==false){
                   $data[$i]['bulan'] = $item->bulan;
                   if($item->kategori == 1){
                       $data[$i]['jum1'] = $item->jum;
                   }else{
                       $data[$i]['jum2'] = $item->jum;
                   }
               }


           }else{
               $data[0]['bulan'] = $item->bulan;
               if($item->kategori == 1){
                   $data[0]['jum1'] = $item->jum;
               }else{
                   $data[0]['jum2'] = $item->jum;
               }
           }

       }

       for($n=0; $n<count($data);$n++){
           if($data[$n]['bulan']==1){
               $data[$n]['bulan'] = "Januari";
           }elseif($data[$n]['bulan']==2){
               $data[$n]['bulan'] = "Februari";
           }elseif($data[$n]['bulan']==3){
               $data[$n]['bulan'] = "Maret";
           }elseif($data[$n]['bulan']==4){
               $data[$n]['bulan'] = "April";
           }elseif($data[$n]['bulan']==5){
               $data[$n]['bulan'] = "Mei";
           }elseif($data[$n]['bulan']==6){
               $data[$n]['bulan'] = "Juni";
           }elseif($data[$n]['bulan']==7){
               $data[$n]['bulan'] = "Juli";
           }elseif($data[$n]['bulan']==8){
               $data[$n]['bulan'] = "Agustus";
           }elseif($data[$n]['bulan']==9){
               $data[$n]['bulan'] = "September";
           }elseif($data[$n]['bulan']==10){
               $data[$n]['bulan'] = "Oktober";
           }elseif($data[$n]['bulan']==11){
               $data[$n]['bulan'] = "November";
           }
           elseif($data[$n]['bulan']==12){
               $data[$n]['bulan'] = "Desember";
           }
       }


       return $data;
   }

    public function chartDept($tahun){
        $inovasi = inovasi::select(DB::raw('count(inovasi_id) as jum, unit_biro.nama as departemen'))
                            ->join('tims','tims.tim_id','=','inovasis.tim_id')
                            ->join('unit_biro','unit_biro.kode','=','tims.departemen')
                            ->where('inovasis.created_at','like', '%2019%')
                            ->groupBy('unit_biro.nama')
                            ->get()->toArray();
        return response()->json($inovasi);
    }

//    public function chartJekel($tahun){
//        $inovasi = inovasi::select(DB::raw('count(inovasi_id) as jum, unit_biro.nama as departemen'))
//            ->join('tims','tims.tim_id','=','inovasis.tim_id')
//            ->join('unit_biro','unit_biro.kode','=','tims.departemen')
//            ->where('inovasis.created_at','like', '%2019%')
//            ->groupBy('unit_biro.nama')
//            ->get()->toArray();
//        return response()->json($inovasi);
//    }
}
