<?php

namespace App\Http\Controllers;

use App\Neighborhood;

class AdminPanelController extends Controller
{
    public function __construct()
    {
        //m$this->middleware('auth');
    }

    public function index() {
        $barrios = Neighborhood::orderBy('id', 'desc')->get();

        foreach ($barrios as $barrio) {
            $barrio['countC'] = count($barrio->countComplaints);
        }

        return view('admin-panel.index', [
            'barrios' => $barrios->sortByDesc('countC')
        ]);
    }
}
