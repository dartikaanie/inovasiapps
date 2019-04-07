<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests\CreatekriteriaRequest;
use App\Http\Requests\UpdatekriteriaRequest;
use App\Models\kategori;
use App\Models\kriteraiaKategoriPenilaian;
use App\Models\kriteria;
use App\Models\subKategori;
use App\Models\subKriteria;
use App\Repositories\kriteriaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use PhpParser\Builder;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Yajra\Datatables\Datatables;
use Auth;

class kriteriaController extends AppBaseController
{
    /** @var  kriteriaRepository */
    private $kriteriaRepository;

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
     * Display a listing of the kriteria.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
       $kategoris = kategori::all();
//       $krikats = kriteraiaKategoriPenilaian::all()->groupBy('sub_kategori_id');
//       dd($krikat);

        $subKategoris= subKategori::all();
       $kriterias=kriteria::all();
       $subKriterias = subKriteria::all();

        return view('admin.kriterias.index', compact('kategoris','kriterias','subKategoris','subKriterias'));
    }

    public function getData(){

        $kriterias = kriteria::select(['kriteria_id','nama_kriteria','created_at','updated_at']);

        return Datatables::of($kriterias)->make();
    }
    /**
     * Show the form for creating a new kriteria.
     *
     * @return Response
     */
    public function create()
    {
        $kategoris = kategori::pluck('nama_kategori','kategori_id');
        return view('kriterias.create', compact('kategoris'));
    }

    /**
     * Store a newly created kriteria in storage.
     *
     * @param CreatekriteriaRequest $request
     *
     * @return Response
     */
    public function store(CreatekriteriaRequest $request)
    {
        $input = $request->all();

        $kriteria = $this->kriteriaRepository->create($input);

        Flash::success('Kriteria saved successfully.');

        return redirect(route('kriterias.index'));
    }

    /**
     * Display the specified kriteria.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $kriteria = $this->kriteriaRepository->findWithoutFail($id);

        if (empty($kriteria)) {
            Flash::error('Kriteria not found');

            return redirect(route('kriterias.index'));
        }

        return view('kriterias.show')->with('kriteria', $kriteria);
    }

    /**
     * Show the form for editing the specified kriteria.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $kriteria = $this->kriteriaRepository->findWithoutFail($id);

        if (empty($kriteria)) {
            Flash::error('Kriteria not found');

            return redirect(route('kriterias.index'));
        }

        return view('kriterias.edit')->with('kriteria', $kriteria);
    }

    /**
     * Update the specified kriteria in storage.
     *
     * @param  int              $id
     * @param UpdatekriteriaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatekriteriaRequest $request)
    {
        $kriteria = $this->kriteriaRepository->findWithoutFail($id);

        if (empty($kriteria)) {
            Flash::error('Kriteria not found');

            return redirect(route('kriterias.index'));
        }

        $kriteria = $this->kriteriaRepository->update($request->all(), $id);

        Flash::success('Kriteria updated successfully.');

        return redirect(route('kriterias.index'));
    }

    /**
     * Remove the specified kriteria from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $kriteria = $this->kriteriaRepository->findWithoutFail($id);

        if (empty($kriteria)) {
            Flash::error('Kriteria not found');

            return redirect(route('kriterias.index'));
        }

        $this->kriteriaRepository->delete($id);

        Flash::success('Kriteria deleted successfully.');

        return redirect(route('kriterias.index'));
    }
}
