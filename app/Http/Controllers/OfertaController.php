<?php

namespace App\Http\Controllers;

use App\Models\Oferta;
use Illuminate\Http\Request;

use App\Http\Requests;

class OfertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ofertas = Oferta::orderBy('id','DESC')->paginate(5);
        return view('Ofertas.index',compact('ofertas'))
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
        return view('Ofertas.create',compact('tags'));
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
            'local_id' => 'required',
            'nombre_oferta' => 'required',
            'precio' => 'required',
            'fecha_inicio' => 'required',
            'fecha_termino' => 'required',
            'hora_termino' => 'required',
            'descripcion' => 'required',
            'tag_id' => 'required',
        ]);
        Oferta::create($request);
        return redirect()->route('news.index')
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
        $oferta = Oferta::find($id);
        return view('Ofertas.show',compact('oferta'));
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
        $locales = Tag::lists('nombre_local','id');
        $news = News::find($id);
        return view('Ofertas.edit',compact('news','tags','locales'));
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
            'local_id' => 'required',
            'nombre_oferta' => 'required',
            'precio' => 'required',
            'fecha_inicio' => 'required',
            'fecha_termino' => 'required',
            'hora_termino' => 'required',
            'descripcion' => 'required',
            'tag_id' => 'required',
        ]);





            Oferta::find($id)->update($request);
            return redirect()->route('oferta.index')
                ->with('success','Oferta updated successfully');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Oferta::find($id)->delete();
        return redirect()->route('oferta.index')
            ->with('success','Oferta deleted successfully');
    }
}
