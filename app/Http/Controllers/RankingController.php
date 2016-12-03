<?php

namespace App\Http\Controllers;

use App\Models\Local;
use App\Models\Ranking;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class RankingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $rankings = Ranking::orderBy('id','DESC')->paginate(5);
        return view('Rankings.index',compact('rankings'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::lists('nickname','id');
        $locales = Local::lists('nombre_local','id');
        return view('Rankings.create',compact('users','locales'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required',
            'voto' => 'required',
            'local_id' => 'required',
        ]);



        Ranking::create($request);

        return redirect()->route('ranking.index')
            ->with('success','Ranking created successfully');




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ranking = Ranking::find($id);
        return view('Rankings.show',compact('ranking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::lists('nickname','id');
        $locales = Local::lists('nombre_local','id');
        $ranking = Ranking::find($id);
        return view('Rankings.edit',compact('ranking','users','locales'));
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

        $this->validate($request, [
            'user_id' => 'required',
            'voto' => 'required',
            'local_id' => 'required',
        ]);





            Ranking::find($id)->update($request);
            return redirect()->route('ranking.index')
                ->with('success','Ranking updated successfully');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ranking::find($id)->delete();
        return redirect()->route('ranking.index')
            ->with('success','Ranking deleted successfully');
    }
}
