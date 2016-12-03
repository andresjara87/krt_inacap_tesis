<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $comentarios = Comentario::orderBy('id','DESC')->paginate(5);
        return view('Comentarios.index',compact('comentarios'))
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
        return view('Comentarios.create',compact('users'));
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
            'comentario' => 'required',
            'user_id' => 'required',
        ]);




        Comentario::create($request);

        return redirect()->route('comentario.index')
            ->with('success','News created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comentario = Comentario::find($id);
        return view('Comentarios.show',compact('comentario'));
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
        $comentario = Comentario::find($id);
        return view('Comentarios.edit',compact('comentario','users'));
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
            'comentario' => 'required',
            'user_id' => 'required',
        ]);





            Comentario::find($id)->update($request);
            return redirect()->route('comentario.index')
                ->with('success','Comentarios updated successfully');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Comentario::find($id)->delete();
        return redirect()->route('comentario.index')
            ->with('success','Comentarios deleted successfully');
    }
}
