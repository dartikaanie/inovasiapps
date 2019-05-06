<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\AppBaseController;
use App\Models\anggotaTim;
use App\Models\areaImplementasi;
use App\Models\inovasi;
use App\Models\subKategori;
use App\Models\tim;
use App\User;
use Illuminate\Http\Request;
use DB;
use Maatwebsite\Excel\Facades\Excel;


class laporanController extends AppBaseController
{
    public function bulan(Request $request){
        $input= $request->all();
        $date = date_create($input['date']);
        $bulan = date_format($date,'F');
        $bulan2 =0;
        $tahun =  date_format($date,'Y');
        $inovasis = inovasi::where('created_at','like', $input['date'].'%')->get();

        $anggota=[];
        $n=0;
        foreach ($inovasis as $inovasi) {
            $anggota[$n] = anggotaTim::where('tim_id', $inovasi->tim_id)->get();
            $n++;
        }
        if($input['submit'] == "lihat"){
            return view('admin.laporan.laporan_bulan', compact('inovasis','bulan','tahun','anggota','bulan2'));
        }else{

            $data =  inovasi::where('inovasis.created_at','like', $input['date'].'%')->get();
            $this->exportData($data);
        }
    }


    public function tahun(Request $request){
        $input= $request->all();
        $date = date_create($input['date']);
        $bulan = date_format($date,'F');
        $bulan2 =0;
        $tahun =  date_format($date,'Y');
        $inovasis = inovasi::where('created_at','like', $input['date'].'%')->get();

        $anggota=[];
        $n=0;
        foreach ($inovasis as $inovasi) {
            $anggota[$n] = anggotaTim::where('tim_id', $inovasi->tim_id)->get();
            $n++;
        }
        if($input['submit'] == "lihat"){
            return view('admin.laporan.laporan_bulan', compact('inovasis','bulan','tahun','anggota','bulan2'));
        }else{

            $data =  inovasi::where('inovasis.created_at','like', $input['date'].'%')->get();
            $this->exportData($data);
        }
    }


    public function semua(Request $request){
        $inovasis = inovasi::all();
        $bulan = 0;
        $bulan2 =0;
        $tahun=0;
        $anggota=[];
        $n=0;
        foreach ($inovasis as $inovasi) {
            $anggota[$n] = anggotaTim::where('tim_id', $inovasi->tim_id)->get();
            $n++;
        }
        if($request->submit == "lihat"){
            return view('admin.laporan.laporan_bulan', compact('inovasis','bulan','tahun','anggota','bulan2'));
        }else{

            $inovasis = inovasi::all();
            $this->exportData($inovasis);

        }

    }

    public function tigaBulan(Request $request){
//        date('Y-m-d', strtotime('+6 month', strtotime( variabel_tgl_awal )));
        $input= $request->all();
        $date = date_create($input['date']);
        $bulan = date_format($date,'F');
        $tahun =  date_format($date,'Y');
        $bulan2 = date('F', strtotime('+2 month', strtotime( $input['date'] )));

        $date1 = date('Y-m', strtotime('+1 month', strtotime( $input['date'] )));
        $date2 = date('Y-m', strtotime('+2 month', strtotime( $input['date'] )));

        $inovasis = inovasi::where('created_at','like', $input['date'].'%')
                            ->orWhere('created_at','like', $date1.'%')
                            ->orWhere('created_at','like', $date2.'%')
                            ->get()
                            ->sortBy('created_at');

        $anggota=[];
        $n=0;
        foreach ($inovasis as $inovasi) {
            $anggota[$n] = anggotaTim::where('tim_id', $inovasi->tim_id)->get();
            $n++;
        }
        if($input['submit'] == "lihat"){
            return view('admin.laporan.laporan_bulan', compact('inovasis','bulan','tahun','anggota','bulan2'));
        }else{

            $data =  inovasi::where('inovasis.created_at','like', $input['date'].'%')->get();
            $this->exportData($data);

        }
}

    public function exportData($data){
            $itemsArray = [];
            foreach ($data as $item) {

                //sub Kategori
                $sub_kategori = subKategori::find($item['sub_kategori_id']);
                $item['sub_kategori'] = $sub_kategori->nama_sub_kategori;


                //Tambah field angota tim
                $anggota = anggotaTim::where('tim_id', $item['tim_id'])->get();
                //select nama anggota tims
                $anggota_tim=[]; $p=0;
                foreach ($anggota as $a){
                    $anggota_tim[$p] = $a->Users->nama;
                    $p++;
                }
                $item['anggota_tim'] = implode(", ",$anggota_tim);

                //inisiator
                $inisiator =  User::where('nip',$item['nip_inisiator'])->first();
                $falitator = User::where('nip',$item['nip_fasilitator'])->first();

                if($inisiator == null){
                    $item['Inisiator'] ="";
                }else{
                    $item['Inisiator'] = $falitator->nama;
                }


                if( $item['area_implementasi'] != null){
                    $item['area_implementasi'] = $item->areas->area_implementasi;
                }

                if( $item['tim_id'] != null){
                    $tim = tim::find($item['tim_id']);
                    $item['tim'] = $tim->nama_tim;
                }

                if($falitator == null){
                    $item['nip_fasilitator'] ="";
                }else{
                    $item['nip_fasilitator'] = $falitator->nama;
                }

                if($item['status_implementasi'] == 0){

                    $item['status implementasi'] = "Belum";

                }else{
                    $item['status implementasi'] = "Sudah";
                }


                unset($item['tgl_pelaksanaan'],$item['updated_at'],$item['updated_at'],$item['deleted_at'],$item['stream_id'],$item['dokumen_tim'],$item['dokumen_pendukung']);
                unset($item['nip_inisiator'], $item['sub_kategori_id'], $item['tim_id'], $item['status_implementasi']);
                unset($item['status'], $item['status_penilaian'], $item['status_registrasi']);
                $itemsArray[] = $item->toArray();

            }

            return  Excel::create('inovasi', function($excel) use ($itemsArray) {
                $excel->sheet('mySheet', function($sheet) use ($itemsArray)
                {
                    $sheet->fromArray($itemsArray);
                });
            })->download('xls');
        }



}
