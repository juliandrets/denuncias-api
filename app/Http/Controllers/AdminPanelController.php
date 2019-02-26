<?php

namespace App\Http\Controllers;

class AdminPanelController extends Controller
{
    public function __construct()
    {
        //m$this->middleware('auth');
    }

    public function index() {
        return view('admin-panel.index');
    }
}
