<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Similitud extends Model
{
    protected $table = 'similitudes';
    public $timestamps = false;

    protected $fillable = ['userX_id','userY_id','nota'];

    public function userX(){

        return $this->belongsTo(User::class, 'userX_id');

    }
    public function userY(){

        return $this->belongsTo(User::class, 'userY_id');

    }
    public function createSimilitud($userX, $userY){

        $consulta = Similitud::all();
        $existe = $consulta->where('userX_id',$userX);
        $existe = $existe->first();
      //  echo $existe;
        if($existe==''){
            foreach($userY as $key => $similitudes){
                $similitud = new Similitud();
                $similitud->userX_id = $userX;
                $similitud->userY_id = $key;
                $similitud->nota = $similitudes;

                //      echo $similitud->nota;
                 $similitud->save();
            }
        }else{
         //   echo "no esta vacio";
            $mismoUser = $consulta->where('userX_id',$userX);
            foreach($mismoUser as $key => $borrar){
               $borrar->delete();

            }
            foreach($userY as $key => $similitudes){
                $similitud = new Similitud();
                $similitud->userX_id = $userX;
                $similitud->userY_id = $key;
                $similitud->nota = $similitudes;
                $similitud->save();

            }
        }
        foreach($userY as $key => $similitudes){
            $similitud = new Similitud();
            $similitud->userX_id = $userX;
            $similitud->userY_id = $key;
            $similitud->nota = $similitudes;
        }
      //  dd($existe);

    }

}
