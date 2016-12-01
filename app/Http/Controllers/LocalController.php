<?php

namespace App\Http\Controllers;

use App\Models\Local;
use Illuminate\Http\Request;

use App\Http\Requests;

class LocalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $locales = Local::orderBy('id','DESC')->paginate(5);
        return view('Locales.index',compact('locales'))
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
        return view('Local.create',compact('tags'));
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
            'tag_id' => 'required',
            'logo' => 'mimes:jpeg,bmp,png,jpg',
            'encabezado' => 'mimes:jpeg,bmp,png,jpg',
        ]);

        if($request->hasFile('logo')){
            $file = $request->file('logo');
            $filename=$file->getClientOriginalName();
            $request->file('logo')->move(public_path('uploads'),$filename);
        }
        if($request->hasFile('encabezado')){
            $file = $request->file('encabezado');
            $filename=$file->getClientOriginalName();
            $request->file('encabezado')->move(public_path('uploads'),$filename);
        }
        $data = $request->except(['logo'],['encabezado']);
        $data['logo'] = public_path('uploads') . '/' . $request->file('logo')->getClientOriginalName();
        $data['encabezado'] = public_path('uploads') . '/' . $request->file('encabezado')->getClientOriginalName();

        Local::create($data);

        return redirect()->route('local.index')
            ->with('exitoso','Local creado correctamente');




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $local = Local::find($id);
        return view('Local.show',compact('local'));
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
        $local = Local::find($id);
        return view('Local.edit',compact('local','tags'));
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
            'tag_id' => 'required',
            'logo' => 'mimes:jpeg,bmp,png,jpg',
            'encabezado' => 'mimes:jpeg,bmp,png,jpg',
        ]);

        if($request->hasFile('logo') && $request->hasFile('encabezado')){
            $file = $request->file('logo');
            $filename=$file->getClientOriginalName();
            $request->file('logo')->move(public_path('uploads'),'photo_'.$id.'_'.$filename);

            $file = $request->file('encabezado');
            $filename=$file->getClientOriginalName();
            $request->file('encabezado')->move(public_path('uploads'),'photo_'.$id.'_'.$filename);

            $data = $request->except(['logo'],['encabezado']);
            $data['logo'] = public_path('uploads') . '/' . 'photo_'.$id.'_'.$request->file('logo')->getClientOriginalName();
            $data['encabezado'] = public_path('uploads') . '/' . 'photo_'.$id.'_'.$request->file('logo')->getClientOriginalName();



            //      $img = News::lists('imgNews');

            $path_old =  Local::find($id)->logo;;
            File::delete($path_old);
            $path_old2 =  Local::find($id)->encabezado;;
            File::delete($path_old2);

            Local::find($id)->update($data);
            return redirect()->route('local.index')
                ->with('exitoso','Local actualizado correctamente');


        }else{

            $data = $request->except(['logo'],['encabezado']);

            Local::find($id)->update($data);
            return redirect()->route('local.index')
                ->with('exitoso','Local actualizado correctamente');

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
        Local::find($id)->delete();
        return redirect()->route('local.index')
            ->with('exitoso','Local borrado correctamente');
    }
}
