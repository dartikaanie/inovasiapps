<?php

namespace App\Http\Controllers;

use App\Models\inovasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role_id == 1 ){
            return redirect(route('dashboard', compact('inovasi')));
        }else{
            return redirect(route('dashboardPeserta'));
        }

    }
}
