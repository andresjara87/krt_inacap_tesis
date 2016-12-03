<?php

namespace App\Http\Controllers;

use App\Models\Ruta;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class RutaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $rutas = Ruta::orderBy('id','DESC')->paginate(5);
        return view('Rutas.index',compact('rutas'))
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
        return view('Rutas.create',compact('users'));
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
            'presupuesto' => 'required',
            'cantidad_personas' => 'required',
        ]);


        Ruta::create($request);

        return redirect()->route('ruta.index')
            ->with('success','Ruta created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ruta = Ruta::find($id);
        return view('Rutas.show',compact('ruta'));
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
        $ruta = Ruta::find($id);
        return view('Rutas.edit',compact('ruta','users'));
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
            'presupuesto' => 'required',
            'cantidad_personas' => 'required',
        ]);


            Ruta::find($id)->update($request);
            return redirect()->route('ruta.index')
                ->with('success','Ruta updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ruta::find($id)->delete();
        return redirect()->route('ruta.index')
            ->with('success','Ruta deleted successfully');
    }
}
