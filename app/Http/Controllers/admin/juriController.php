<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreatejuriRequest;
use App\Http\Requests\UpdatejuriRequest;
use App\Models\juri;
use App\Models\kategori;
use App\Models\stream;
use App\Repositories\juriRepository;
use App\Http\Controllers\AppBaseController;
use App\User;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Auth;

class juriController extends AppBaseController
{
    /** @var  juriRepository */
    private $juriRepository;

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

    /**
     * Display a listing of the juri.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $juris = juri::all();

        return view('admin.juris.index')
            ->with('juris', $juris);
    }

    /**
     * Show the form for creating a new juri.
     *
     * @return Response
     */
    public function create()
    {
        $juris = juri::all();
        foreach ($juris as $juri) {
            $data[] = $juri->nip;
        }
        $user = User::where('role_id',1)->whereNotIn('nip', $data)->get();
        $kategoris = kategori::pluck('nama_kategori','kategori_id');
        return view('admin.juris.create', compact('user','kategoris'));
    }

    /**
     * Store a newly created juri in storage.
     *
     * @param CreatejuriRequest $request
     *
     * @return Response
     */
    public function store(CreatejuriRequest $request)
    {
        $input = $request->all();

        juri::create($input);

        Flash::success('Juri saved successfully.');

        return redirect(route('juris.index'));
    }

    /**
     * Display the specified juri.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $juri = $this->juriRepository->findWithoutFail($id);

        if (empty($juri)) {
            Flash::error('Juri not found');

            return redirect(route('juris.index'));
        }

        return view('admin.juris.show')->with('juri', $juri);
    }

    /**
     * Show the form for editing the specified juri.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $juri = juri::find($id);
        $user = User::pluck('nama','nip');
        $kategoris = kategori::pluck('nama_kategori','kategori_id');

        if (empty($juri)) {
            Flash::error('Juri not found');

            return redirect(route('juris.index'));
        }

        return view('admin.juris.edit', compact('juri', 'user','kategoris'));
    }

    /**
     * Update the specified juri in storage.
     *
     * @param  int              $id
     * @param UpdatejuriRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatejuriRequest $request)
    {
        $juri = $this->juriRepository->findWithoutFail($id);

        if (empty($juri)) {
            Flash::error('Juri not found');

            return redirect(route('juris.index'));
        }

        $juri = $this->juriRepository->update($request->all(), $id);

        Flash::success('Juri updated successfully.');

        return redirect(route('juris.index'));
    }

    /**
     * Remove the specified juri from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $juri = juri::find($id);

        if (empty($juri)) {
            Flash::error('Juri not found');

            return redirect(route('juris.index'));
        }

       $juri->delete();

        Flash::success('Juri deleted successfully.');

        return redirect(route('juris.index'));
    }

    public function ubahStatus($nip){
        $juri = juri::find($nip);
        if($juri->status_aktif == 0){
            $juri->update(['status_aktif' => '1']);
        }else{
            $juri->update(['status_aktif' => '0']);
        }
        return redirect(route('juris.index'));
    }
}
