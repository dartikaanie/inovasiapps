<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests\CreatestreamRequest;
use App\Http\Requests\UpdatestreamRequest;
use App\Models\inovasi;
use App\Models\juri;
use App\Models\kategori;
use App\Models\stream;
use App\Models\streamInovasi;
use App\Models\streamJuri;
use App\Repositories\streamRepository;
use App\Http\Controllers\AppBaseController;
use App\User;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class streamController extends AppBaseController
{
    /** @var  streamRepository */
    private $streamRepository;

    public function __construct(streamRepository $streamRepo)
    {
        $this->streamRepository = $streamRepo;
    }

    /**
     * Display a listing of the stream.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $streams = stream::all()->sortBy('kategori_id');
        $streams = $this->streamRepository->all();

        return view('admin.streams.index')
            ->with('streams', $streams);
    }

    /**
     * Show the form for creating a new stream.
     *
     * @return Response
     */
    public function create()
    {
        $kategoris = kategori::pluck('nama_kategori', 'kategori_id');
        return view('admin.streams.create', compact('kategoris'));
    }

    /**
     * Store a newly created stream in storage.
     *
     * @param CreatestreamRequest $request
     *
     * @return Response
     */
    public function store(CreatestreamRequest $request)
    {
        $input = $request->all();

        $stream = $this->streamRepository->create($input);

        Flash::success('Stream saved successfully.');

        return redirect(route('streams.index'));
    }

    /**
     * Display the specified stream.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $stream = stream::where('stream_id', $id)->first();
        $juris = juri::where('stream_id', $id)->where('juris.status_aktif','=',1)->get();
        $streamInovasis = inovasi::where('stream_id', $id)->get();


        if (empty($stream)) {
            Flash::error('Stream not found');

            return redirect(route('streams.index'));
        }

        return view('admin.streams.show', compact('stream','juris','streamInovasis'));
    }

    /**
     * Show the form for editing the specified stream.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $stream = $this->streamRepository->findWithoutFail($id);

        if (empty($stream)) {
            Flash::error('Stream not found');

            return redirect(route('streams.index'));
        }

        return view('admin.streams.edit')->with('stream', $stream);
    }

    /**
     * Update the specified stream in storage.
     *
     * @param  int              $id
     * @param UpdatestreamRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatestreamRequest $request)
    {
        $stream = $this->streamRepository->findWithoutFail($id);

        if (empty($stream)) {
            Flash::error('Stream not found');

            return redirect(route('streams.index'));
        }

        $stream = $this->streamRepository->update($request->all(), $id);

        Flash::success('Stream updated successfully.');

        return redirect(route('admin.streams.index'));
    }

    /**
     * Remove the specified stream from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $stream = $this->streamRepository->findWithoutFail($id);

        if (empty($stream)) {
            Flash::error('Stream not found');

            return redirect(route('streams.index'));
        }

        $this->streamRepository->delete($id);

        Flash::success('Stream deleted successfully.');

        return redirect(route('admin.streams.index'));
    }

    public function delete($id){
     $stream = stream::where('stream_id', $id)->first();
        if (empty($stream)) {
            Flash::error('Stream not found');

            return redirect(route('streams.index'));
        }else{
            $sJuri = juri::where('stream_id', $id)->get();
            if (!empty($sJuri)) {
                foreach ($sJuri as $item) {
                    $item->update(['stream_id' => null]);
                }
            }
            $sInov = inovasi::where('stream_id', $id)->get();
            if (!empty($sInov)) {
                foreach ($sInov as $i) {
                    $i->update(['stream_id' => null]);
                }
            }
            $stream->delete();

            Flash::success('Stream deleted successfully.');

            return redirect(route('streams.index'));
        }
    }

    public function addJuri($stream_id)
    {
        $stream= stream::find($stream_id);
        $users = User::join('juris','juris.nip','=','users.nip')
                       ->where('juris.status_aktif','=','1')
                       ->where('juris.stream_id','=',null)
                       ->pluck('nama','users.nip');
        return view('admin.streams.stream_juris.create', compact('users','stream_id'));
    }


    public function streamJuri(Request $request){
        $input = $request->all();
        $stream_id = $input['stream_id'];
        $juri = juri::where('nip', $input['nip_juri'])->first();
        $juri->update([
            'stream_id' => $stream_id
        ]);
        return redirect(route('streams.show',[$stream_id]));
    }

    public  function deleteStreamJuri($nip,$stream_id){
        $juri = juri::find($nip);
        if(empty($juri)){
            Flash::error('gagal dihapus');
            return redirect(route('streams.show',[$stream_id]));
        }
        Flash::success('berhasil dihapus');
        $juri->update([
            'stream_id' => null
        ]);
        return redirect(route('streams.show',[$stream_id]));


    }

    public function addInovasi($stream_id)
    {
        $stream= stream::find($stream_id);
        $inovasis = inovasi::join('sub_kategoris','sub_kategoris.sub_kategori_id','=','inovasis.sub_kategori_id')
            ->join('kategoris','kategoris.kategori_id','=','sub_kategoris.kategori_id')
            ->where('kategoris.kategori_id',$stream->kategori_id)
            ->where('inovasis.status_registrasi','2')
            ->where('inovasis.stream_id', null)
            ->get();
//        dd($inovasis);
        return view('admin.streams.stream_inovasis.create', compact('inovasis','stream_id'));
    }

    public function streamInovasi(Request $request){
        $input = $request->all();
        $stream_id = $input['stream_id'];
        dd($input);

        for($n=0 ; $n<count($input)-2; $n++){
           $inovasi = inovasi::where('inovasi_id', $input['inovasi-'.$n])->first();
           $inovasi->update([
               'stream_id' => $stream_id
           ]);
        }
        return redirect(route('streams.show',[$stream_id]));
    }

    public  function deleteStreamInovasi($inovasi_id,$stream_id){
        $inovasi = inovasi::find($inovasi_id);
        if(empty($inovasi)){
            Flash::error('gagal dihapus');
            return redirect(route('streams.show',[$stream_id]));
        }
        Flash::success('berhasil dihapus');
        $inovasi->delete();
        return redirect(route('streams.show',[$stream_id]));


    }

    public  function detailStreamInovasi($inovasi_id, $stream_id){
        $inovasi = inovasi::find($inovasi_id);
        return view('admin.streams.stream_inovasis.show', compact('inovasi','stream_id'));
    }

}