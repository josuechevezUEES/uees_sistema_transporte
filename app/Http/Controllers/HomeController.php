<?php

namespace App\Http\Controllers;

use App\Models\Carrera\Carrera;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $carreras = Carrera::all('NIVCOD');

        return view('home')
            ->with('carreras', $carreras);
    }
}
