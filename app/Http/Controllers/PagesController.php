<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller {

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getHome()
    {
        return view('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLanding()
    {
        return view('landing');
    }

}
