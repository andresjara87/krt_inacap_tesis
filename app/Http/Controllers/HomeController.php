<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Voting;
use Session;

class HomeController extends Controller
{

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

        $session = Session::all();
        //dd(Session::all());
        $tt = array_values($session)[3];
        $this->votoNull($tt);
        $user = $tt;
        $sessionInactivo = $this->votoNull($tt);
        $var =0;

        if($sessionInactivo==false && $sessionInactivo==''){
            $var =0;
        }else{
            $var =1;
        }



      //  dd($tt);


        return view('public_krt.index',compact('var','user'));
    }

    public function votoNull($tt){
        $userSession = Voting::where('user_id',$tt)->get();
        $votoNotNull =false;

        foreach($userSession as $key=> $u){

            if($u->vote!=''){
                $votoNotNull = true;
                break;
            }else{
                $votoNotNull = false;
            }
        }

        return $votoNotNull;

       // dd($votoNotNull);
    }
}
