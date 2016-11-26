<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voting extends Model
{
    protected $table = 'voting';

    protected $fillable = ['vote'];



    public function createData($idUser){

        $tags = Tag::all();
        foreach ($tags as $t){

            $voting = new Voting();
            $voting->user_id = $idUser;
            $voting->tag_id = $t->id;
            $voting->save();

        }


      /*  $tags = DB::table('tags')
            ->select(DB::raw('*'))
            ->where('id', '=', $id)
            ->get();
        $array = array();
        foreach($tags as $t){
            insertAutomatic();
            $array[] = $t->$idTag;

        }*/



    }
}
