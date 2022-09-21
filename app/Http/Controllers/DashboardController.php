<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CalonTenagaHonorer;
use App\Models\Kriteria;
use App\Models\SubKriteria;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $honorer=CalonTenagaHonorer::count();
        $kriteria=Kriteria::count();
        $subkriteria=SubKriteria::count();
        return view('dashboard',compact('honorer','kriteria','subkriteria'));
    }

}
