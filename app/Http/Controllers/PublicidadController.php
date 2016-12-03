<?php

namespace App\Http\Controllers;

use App\Models\Publicidad;
use Illuminate\Http\Request;

use App\Http\Requests;

class PublicidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $publicidades = Publicidad::orderBy('id','DESC')->paginate(5);
        return view('Publicidades.index',compact('publicidades'))
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
        return view('Publicidades.create',compact('tags'));
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
            'nombre_publicidad' => 'required',
            'img_publicidad' => 'required|mimes:jpeg,bmp,png,jpg',
            'tag_id' => 'required',
        ]);

        if($request->hasFile('imgNews')){
            $file = $request->file('imgNews');
            $filename=$file->getClientOriginalName();
            $request->file('imgNews')->move(public_path('uploads'),$filename);




        }
        $data = $request->except(['imgNews']);
        $data['imgNews'] = public_path('uploads') . '/' . $request->file('imgNews')->getClientOriginalName();

        Publicidad::create($data);

        return redirect()->route('publicidad.index')
            ->with('success','Publicidad created successfully');




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $publicidad = Publicidad::find($id);
        return view('Publicidades.show',compact('publicidad'));
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
        $publicidad = Publicidad::find($id);
        return view('Publicidades.edit',compact('publicidad','tags'));
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
            'nombre_publicidad' => 'required',
            'img_publicidad' => 'required|mimes:jpeg,bmp,png,jpg',
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
            Publicidad::find($id)->update($data);
            return redirect()->route('publicidad.index')
                ->with('success','Publicidad updated successfully');


        }else{

            $data = $request->except(['imgNews']);

            Publicidad::find($id)->update($data);
            return redirect()->route('publicidad.index')
                ->with('success','Publicidad updated successfully');

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
        Publicidad::find($id)->delete();
        return redirect()->route('publicidad.index')
            ->with('success','Publicidad deleted successfully');
    }
}
