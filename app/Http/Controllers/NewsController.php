<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Requests;
use File;


class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tidings = News::orderBy('id','DESC')->paginate(5);
        return view('News.index',compact('tidings'))
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
        return view('News.create',compact('tags'));
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
            'nameNews' => 'required',
            'bodyNews' => 'required',
            'imgNews' => 'required|mimes:jpeg,bmp,png,jpg',
            'tag_id' => 'required',
        ]);

         if($request->hasFile('imgNews')){
            $file = $request->file('imgNews');
             $filename=$file->getClientOriginalName();
             $request->file('imgNews')->move(public_path('uploads'),$filename);




        }
        $data = $request->except(['imgNews']);
        $data['imgNews'] = public_path('uploads') . '/' . $request->file('imgNews')->getClientOriginalName();

        News::create($data);

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
        $news = News::find($id);
        return view('News.show',compact('news'));
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
        $news = News::find($id);
        return view('News.edit',compact('news','tags'));
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
            'nameNews' => 'required',
            'bodyNews' => 'required',
            'imgNews' => 'mimes:jpeg,bmp,png,jpg',
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

            dd($data);

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
        News::find($id)->delete();
        return redirect()->route('news.index')
            ->with('success','News deleted successfully');
    }
}
