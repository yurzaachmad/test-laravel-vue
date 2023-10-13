<?php

namespace App\Http\Controllers;

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
        return view('home');
    }

    public function pageDosen()
    {
        return view('dosen');
    }

    public function pageMajor()
    {
        return view('major');
    }

    public function pageStudy()
    {
        return view('study');
    }

    public function pageContract()
    {
        return view('contract');
    }

    public function addStudy()
    {
        return view('addstudy');
    }

    public function addMajor()
    {
        return view('addmajor');
    }

    public function addDosen()
    {
        return view('adddosen');
    }

    public function addContract()
    {
        return view('addcontract');
    }
}
