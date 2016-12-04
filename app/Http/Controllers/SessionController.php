<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;


use App\Http\Requests;
use Auth;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(!Auth::guest())
        {
            // do what you need to do
            return redirect()->action('HomeController@index');
        }else{

           return view('public_krt.invitado');
        }



    }


}
