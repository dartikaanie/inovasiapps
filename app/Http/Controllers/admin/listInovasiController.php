<?php

namespace App\Http\Controllers\admin;

use App\Models\inovasi;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Laracasts\Flash\Flash;

class listInovasiController extends AppBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inovasis = inovasi::all()->sortBy('status_registrasi');

        return view('admin.list_inovasis.index', compact('inovasis'));
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
        $inovasi = inovasi::where('inovasi_id', $id)->first();

        if (empty($inovasi)) {
            Flash::error('Inovasi not found');

            return redirect(route('inovasis.index'));
        }

        return view('admin.list_inovasis.show')->with('inovasi', $inovasi);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $r)
    {

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
        $input = $request->all();
        $inovasi = inovasi::where('inovasi_id', $id)->first();
        $inovasi->update($input);
        Flash::success('Status berhasil diubah');
        return redirect(route('listInovasis.show',[$inovasi->inovasi_id]));
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
