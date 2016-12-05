<?php

namespace App\Http\Controllers;

use App\Models\Local;
use App\Models\Role_User;
use App\User;
use Illuminate\Http\Request;
use App\Models\Tag;
use App\Http\Requests;
use Illuminate\Support\Facades\File;



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
        $users = User::all();
        $roleUser = Role_User::all();
        $filtro = array();




        $userCliente = $roleUser->where('role_id',3);

        foreach($userCliente as $key=> $f){

           // echo $userCliente[$key]["user_id"];

            foreach($users as $key2 => $u){
              //  echo $u->id;
                if($userCliente[$key]["user_id"]==$u->id){

                    $filtro[$key]["user_id"] = $u->id;
                    $filtro[$key]["nickname"] = $u->nickname;


                }

            }

        }



      //   dd($filtro[1]["nickname"]);

        return view('Locales.create',compact('tags','filtro'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
  //   var_dump($request);

        $this->validate($request, [
            'user_id' => 'required',
            'tag_id' => 'required',
            'logo' => 'mimes:jpeg,bmp,png,jpg',
            'encabezado' => 'mimes:jpeg,bmp,png,jpg',
        ]);


        $data=$request->all();
        $carpeta=public_path('uploads').'/user'.$data['user_id'].'-'.$data['tag_id'];
        $carpetaLogo=public_path('uploads').'/user'.$data['user_id'].'-'.$data['tag_id'].'/Logo';
        $carpetaEncabezado=public_path('uploads').'/user'.$data['user_id'].'-'.$data['tag_id'].'/Encabezado';

        File::makeDirectory($carpeta);
        File::makeDirectory($carpetaLogo);
        File::makeDirectory($carpetaEncabezado);

        if($request->hasFile('encabezado')){
            $file = $request->file('encabezado');
            $filename=$file->getClientOriginalName();
            $request->file('encabezado')->move($carpetaEncabezado,$filename);

            $data = $request->except(['encabezado']);
            $data['encabezado'] = $carpetaEncabezado . '/' . $request->file('encabezado')->getClientOriginalName();
        }


        if($request->hasFile('logo')){
            $file = $request->file('logo');
            $filename=$file->getClientOriginalName();
            $request->file('logo')->move($carpetaLogo,$filename);
            $data['logo'] = $carpetaLogo . '/' . $request->file('logo')->getClientOriginalName();
        }


    //    dd($data['logo']);
        Local::create($data);
        return redirect()->route('locales.index')
            ->with('exitoso','Local creado correctamente');

/*
            $input = $request->all();
            Local::create($input);
            return redirect()->route('locales.index')
                ->with('exitoso','Local creado correctamente');*/


       /* if($request->hasFile('encabezado')){
            $file = $request->file('encabezado');
            $filename=$file->getClientOriginalName();
            $request->file('encabezado')->move(public_path('uploads'),$filename);
        }*/


    //    $data = $request->except(['logo'],['encabezado']);
    //    $data['logo'] = public_path('uploads') . '/' . $request->file('logo')->getClientOriginalName();
  //      $data['encabezado'] = public_path('uploads') . '/' . $request->file('encabezado')->getClientOriginalName();

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
        return view('Locales.show',compact('local'));
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
        $logo= substr($local->logo, 11);  // devuelve "abcde"
        $encabezado = substr($local->logo, 11);
        $users = User::all();
        $roleUser = Role_User::all();
        $filtro = array();

        $userCliente = $roleUser->where('role_id',3);

        foreach($userCliente as $key=> $f){

            // echo $userCliente[$key]["user_id"];

            foreach($users as $key2 => $u){
                //  echo $u->id;
                if($userCliente[$key]["user_id"]==$u->id){

                    $filtro[$key]["user_id"] = $u->id;
                    $filtro[$key]["nickname"] = $u->nickname;


                }

            }

        }





        return view('Locales.edit',compact('local','tags','filtro','logo','encabezado'));
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



        $data=$request->all();


        $carpetaLogo=public_path('uploads').'/user'.$data['user_id'].'-'.$data['tag_id'].'/Logo';
        $carpetaEncabezado=public_path('uploads').'/user'.$data['user_id'].'-'.$data['tag_id'].'/Encabezado';
        if($request->hasFile('logo')){

            $file = $request->file('logo');
            $filename=$file->getClientOriginalName();
            $request->file('logo')->move($carpetaLogo,$filename);

            $data = $request->except(['logo']);
            $data['logo'] = $carpetaLogo . '/' . $request->file('logo')->getClientOriginalName();


            $path_old =  Local::find($id)->logo;
            File::delete($path_old);
        }

        if($request->hasFile('encabezado')){
            $file = $request->file('encabezado');
            $filename=$file->getClientOriginalName();
            $request->file('encabezado')->move($carpetaEncabezado,$filename);

            $data = $request->except(['encabezado']);
            $data['encabezado'] = $carpetaEncabezado . '/' . $request->file('encabezado')->getClientOriginalName();

            $path_old =  Local::find($id)->encabezado;
            File::delete($path_old);
        }


            Local::find($id)->update($data);
            return redirect()->route('locales.index')
                ->with('exitoso','Local actualizado correctamente');
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
        return redirect()->route('locales.index')
            ->with('exitoso','Local borrado correctamente');
    }
}
