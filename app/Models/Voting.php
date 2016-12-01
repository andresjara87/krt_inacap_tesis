<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voting extends Model
{
    protected $table = 'voting';

    protected $fillable = ['user_id','tag_id','vote'];


    public function tag(){

        return $this->belongsTo(Tag::class, 'tag_id');

    }

    public function user(){

        return $this->belongsTo(User::class, 'user_id');

    }



    public function createData($idUser){

        $tags = Tag::all();
        foreach ($tags as $t){

            $voting = new Voting();
            $voting->user_id = $idUser;
            $voting->tag_id = $t->id;
            $voting->save();

        }

    }
    public function createSimilitud($idUser){

        $voting = DB::table('voting')->where('user_id', $idUser);
     //   $tags = Tag::all();

        foreach ($voting as $t){




        }

    }
}
