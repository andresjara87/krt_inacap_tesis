<?php

namespace App\Http\Controllers;

use App\Models\Pregunta;
use Illuminate\Http\Request;

use App\Http\Requests;

class PreguntaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $preguntas = Pregunta::orderBy('id','DESC')->paginate(5);
        return view('Preguntas.index',compact('preguntas'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::lists('name_tag','id');
        return view('Preguntas.create',compact('tags'));
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
            'pregunta' => 'required',
            'tag_id' => 'required',
        ]);


        Pregunta::create($request);

        return redirect()->route('pregunta.index')
            ->with('success','Pregunta created successfully');




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pregunta = Pregunta::find($id);
        return view('Preguntas.show',compact('pregunta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tags = Tag::lists('name_tag','id');
        $pregunta = Pregunta::find($id);
        return view('Preguntas.edit',compact('pregunta','tags'));
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
            'pregunta' => 'required',
            'tag_id' => 'required',
        ]);





            Pregunta::find($id)->update($request);
            return redirect()->route('pregunta.index')
                ->with('success','Pregunta updated successfully');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pregunta::find($id)->delete();
        return redirect()->route('pregunta.index')
            ->with('success','Pregunta deleted successfully');
    }
}
