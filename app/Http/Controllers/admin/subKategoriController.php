<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests\CreatesubKategoriRequest;
use App\Http\Requests\UpdatesubKategoriRequest;
use App\Models\kategori;
use App\Models\subKategori;
use App\Repositories\subKategoriRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Auth;

class subKategoriController extends AppBaseController
{
    /** @var  subKategoriRepository */
    private $subKategoriRepository;

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

    /**
     * Display a listing of the subKategori.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->subKategoriRepository->pushCriteria(new RequestCriteria($request));
        $subKategoris = $this->subKategoriRepository->all();

        return view('sub_kategoris.index')
            ->with('subKategoris', $subKategoris);
    }

    /**
     * Show the form for creating a new subKategori.
     *
     * @return Response
     */
    public function create()
    {
        $kategoris = kategori::pluck('nama_kategori','kategori_id');
        return view('kategoris.sub_kategoris.create', compact('kategoris'));
    }

    /**
     * Store a newly created subKategori in storage.
     *
     * @param CreatesubKategoriRequest $request
     *
     * @return Response
     */
    public function store(CreatesubKategoriRequest $request)
    {
        $input = $request->all();

        $subKategori = $this->subKategoriRepository->create($input);

        Flash::success('Sub Kategori Berhasil disimpan');

        return redirect(route('kategoris.index'));
    }

    /**
     * Display the specified subKategori.
     *
     * @param  int $id
     *
     * @return Response
     */
//    public function show($id)
//    {
//        $subKategori = subKategori::where('sub_kategori_id', $id)->first();
//        dd($subKategori);
//        if (empty($subKategori)) {
//            Flash::error('Sub Kategori not found');
//
//            return redirect(route('subKategoris.index'));
//        }
//
//        return view('sub_kategoris.show')->with('subKategori', $subKategori);
//    }

    /**
     * Show the form for editing the specified subKategori.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $subKategori = subKategori::where('sub_kategori_id', $id)->first();
        $kategoris = kategori::pluck('nama_kategori','kategori_id');

        if (empty($subKategori)) {
            Flash::error('Sub Kategori not found');

            return redirect(route('subKategoris.index'));
        }

        return view('kategoris.sub_kategoris.edit', compact('subKategori', 'kategoris'));
    }

    /**
     * Update the specified subKategori in storage.
     *
     * @param  int              $id
     * @param UpdatesubKategoriRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatesubKategoriRequest $request)
    {
        $subKategori = subKategori::where('sub_kategori_id', $id)->first();

        if (empty($subKategori)) {
            Flash::error('Sub Kategori not found');

            return redirect(route('kategoris.index'));
        }

        $subKategori->update($request->all());

        Flash::success('Sub Kategori updated successfully.');

        return redirect(route('kategoris.index') );
    }

    /**
     * Remove the specified subKategori from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $subKategori = subKategori::where('sub_kategori_id', $id)->first();
//        dd($subKategori);

        if (empty($subKategori)) {
            Flash::error('Sub Kategori tidak ditemukan');

            return redirect(route('kategoris.index'));
        }

        $subKategori->delete();

        Flash::success('Sub Kategori deleted successfully.');

        return redirect(route('kategoris.index'));
    }
}
