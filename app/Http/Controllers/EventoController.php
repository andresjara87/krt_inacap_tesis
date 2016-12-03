<?php

namespace App\Http\Controllers;


use App\Models\Evento;
use Illuminate\Http\Request;

use App\Http\Requests;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $eventos = Evento::orderBy('id','DESC')->paginate(5);
        return view('Eventos.index',compact('eventos'))
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
        return view('Eventos.create',compact('tags'));
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
            'nombre_evento' => 'required',
            'descripcion' => 'required',
            'img_eventos' => 'required|mimes:jpeg,bmp,png,jpg',
            'tag_id' => 'required',
        ]);

        if($request->hasFile('img_eventos')){
            $file = $request->file('imgNews');
            $filename=$file->getClientOriginalName();
            $request->file('imgNews')->move(public_path('uploads'),$filename);




        }
        $data = $request->except(['img_eventos']);
        $data['imgNews'] = public_path('uploads') . '/' . $request->file('imgNews')->getClientOriginalName();

        Evento::create($data);

        return redirect()->route('evento.index')
            ->with('success','Eventos created successfully');




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $evento = Eventos::find($id);
        return view('Eventos.show',compact('evento'));
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
        $evento = Eventos::find($id);
        return view('Eventos.edit',compact('evento','tags'));
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
            'nombre_evento' => 'required',
            'descripcion' => 'required',
            'img_eventos' => 'required|mimes:jpeg,bmp,png,jpg',
            'tag_id' => 'required',
        ]);

        if($request->hasFile('imgNews')){
            $file = $request->file('imgNews');
            $filename=$file->getClientOriginalName();
            $request->file('imgNews')->move(public_path('uploads'),'photo_'.$id.'_'.$filename);

            $data = $request->except(['imgNews']);
            $data['imgNews'] = public_path('uploads') . '/' . 'photo_'.$id.'_'.$request->file('imgNews')->getClientOriginalName();

            //      $img = News::lists('imgNews');

            $path_old =  News::find($id)->imgNews;;
            File::delete($path_old);
            News::find($id)->update($data);
            return redirect()->route('news.index')
                ->with('success','News updated successfully');


        }else{

            $data = $request->except(['imgNews']);

            News::find($id)->update($data);
            return redirect()->route('news.index')
                ->with('success','News updated successfully');

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Eventos::find($id)->delete();
        return redirect()->route('evento.index')
            ->with('success','Eventos deleted successfully');
    }
}
