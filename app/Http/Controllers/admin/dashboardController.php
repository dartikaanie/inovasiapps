<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\AppBaseController;
use App\Models\inovasi;
use App\Models\juri;
use App\Models\tim;
use Illuminate\Http\Request;

class dashboardController extends AppBaseController
{
   public function index(){
       $juri = juri::where('status_aktif', 1)->get();
       $inovasi_terdaftar = inovasi::all();
       $inovasi_teregister = inovasi::where('status', 2)->get();
       $tim = tim::all();

//       $gchart = new Echart;
//       $gchart->labels($label_tahun_asset);
//       $gchart->dataset('Total Harga', 'line', $label_harga_asset);
//       $gchart->datasets[0]->options([
//           'areaStyle' => []
//       ]);
       // dd($gchart);

       return view('admin.dashboard', compact('juri','inovasi_teregister','inovasi_terdaftar','tim'));
   }
}
