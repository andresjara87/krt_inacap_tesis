<?php

namespace App\Http\Controllers;

use App\Models\Similitud;
use App\Models\Tag;
use App\Models\Voting;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Illuminate\Support\Collection as Collection;

class VotingController extends Controller
{

    public function index(){
        return view('votacion.index');
    }
    public function show($id)
    {
          $idUser = $id;
          $idUser = (int)$idUser;
          $voting = Voting::all();
          $users = $voting;
          $resultado[] = null;
          $resultadosSimilitud=array();
          $ordenArray=array();
          $filtroUser = $voting->where('user_id',$idUser);
          $filtroUserTag =$voting->where('user_id',$idUser);
          $selectionItemTag=array();
          $recomendacion=array();



    //    return View::make('votacion.show',['voting'=>$voting->info]);
     //   return view('votacion.show',compact('voting'));
     //   $voting = Voting::find($id);

         function removeUser($users,$idUser){

             foreach($users as $key => $user){

                 if($user->user_id==$idUser){
                     unset($users[$key]);
                 }
             }
        //     return $users;
         }
        removeUser($users, $idUser);

        $usersAll = $users;
//BORRA LA FILA DE LOS PROBABLES VECINO CERCANO QUE NO VOTARON POR UN DETERMINADO ITEM
        foreach($users as $key => $user){

            if($user->vote==null){
                unset($users[$key]);
            }
        }
     //   dd($usersAll);
        $total=0;
//BORRA LA FILA SI EL USUARIO NO VOTO POR UN DETERMINADO ITEM
        foreach($filtroUser as $key => $user){

            if($user->vote==null){
                unset($filtroUser[$key]);
            }
        }
//BORRA LA FILA SI EL USUARIO VOTO POR ALGUN ITEM
        foreach($filtroUserTag as $key => $userTag){

            if($userTag->vote!=null){
                unset($filtroUserTag[$key]);
            }
        }
// $filtroUserTag contiene los items que el usuario NO voto
        $i = 0;
        $j =0;
        $total=0;

        $userAnterior=0;
        unset($resultadosSimilitud);
        unset($resultado[0]);
//CALCULA LOS VECINOS CERCANOS
        foreach($users as $key1 => $userAll){

          //  dd($object);

            if($userAnterior!=0 && $userAll->user_id!=$userAnterior){


                $totalSimilitud = 1-(1/4)*$total;
                $i++;
                $resultadosSimilitud[$userAnterior] = $totalSimilitud;
         //       echo $userAll->user_id . " " .$userAnterior . "</br>";
          //     echo $userAnterior . " ".$resultadosSimilitud[$userAnterior] . " " .$userAll->tag_id . "</br>";
                $total=0;


            }
            $userAnterior=$userAll->user_id;

            foreach($filtroUser as $key2 => $user){
                if($userAll->tag_id==$user->tag_id){
               $j++;
                    $calculo = ($user->vote - $userAll->vote)/4;
                    $elevado = pow($calculo,2);
                    $total = $total+$elevado;
              /*      echo $userAll->user_id . $userAll->tag_id . $userAll->vote . ' ' . $user->user_id . $user->tag_id . $user->vote;
                    echo '</br>';
                    echo $total;
                    echo '</br>';*/

                   // $resultado[$i] = array($user->user_id,$user->tag_id,$user->vote, $userAll->user_id, $userAll->tag_id, $userAll->vote);
                  //  $resultado

                }
            }
        }
        function endKey($array){
            //Aquí utilizamos end() para poner el puntero
            //en el último elemento, no para devolver su valor
            end($array );
            return key($array);
        }
        $ultimoArray = endKey($resultadosSimilitud);

       if($ultimoArray!=$userAnterior){
           $totalSimilitud = 1-(1/4)*$total;
           $resultadosSimilitud[$userAnterior] = $totalSimilitud;
        }
        arsort($resultadosSimilitud);

        $usersTagTrue=$users;
        $usersTagTrue = $usersTagTrue->all();

        $contador=0;
        $usuarioAnterior=0;
// SE CALCULA LOS VECINOS CERCANOS
        foreach($resultadosSimilitud as $key=> $vecinoSimilitud){
           foreach($usersTagTrue as $key2=> $usuarioVotado){

               if($key==$usuarioVotado->user_id){
                       $usuarioVotado["prediccion"] = $vecinoSimilitud;
                       $usuarioAnterior=$key;

               }
           }
        }
//AGREGA LA FILA PREDICCION A LA TABLA DE LOS VECINOS CERCANOS
        foreach ($usersTagTrue as $key => $row) {
            $aux[$key] = $row['prediccion'];
        }
//ORDENA DE MAYOR A MENOR LAS PREDICCIONES DE LOS VECINOS CERCANOS DEL USUARIO
        array_multisort($aux, SORT_DESC, $usersTagTrue);
        $selection=array();
        $contador =1;
        $userAnterior=0;
 //RECORRE LA TABLA VOTACION+PREDICCION Y GUARDA EN OTRA VARIABLE HASTA 100 USUARIOS
        foreach ($usersTagTrue as $key => $row) {
            if($row->user_id!=$userAnterior){

                if($userAnterior!=0){
                    $contador++;
                }

                $userAnterior=$row->user_id;
            }
            if($contador<=100){

                $selection[$key]["user_id"] = $row['user_id'];
                $selection[$key]["tag_id"] = $row['tag_id'];
                $selection[$key]["vote"] = $row['vote'];
                $selection[$key]["prediccion"] = $row['prediccion'];
            }
        }
        $selectionItem=array();

        $recorrer=0;
       foreach ($filtroUserTag as $key => $usuario) {
           $recorrer++;
           $contador=0;
        //   echo "recorrido numero ".$recorrer."</br>";
            foreach ($selection as $key2 => $s) {
             //   echo $selection[$key2]["tag_id"]."</br>";
            //      echo $usuario->tag_id;
                //echo $selection[$key2]["tag_id"]."</br>";

             //   echo $usuario->tag_id." es igual a ".$selection[$key2]["tag_id"]."</br>";
              //  echo "tag ".$usuario->tag_id. "es igual a tag ".$selection[$key2]["tag_id"]." del usuario ".$selection[$key2]["user_id"]."</br>";
                if($usuario->tag_id==$selection[$key2]["tag_id"]){
                //    echo $selection[$key2]["tag_id"]." es igual a 15";
              //      echo "si el usuario". $selection[$key2]["user_id"]." </br>";
                    $contador++;
                    $selectionItem[key($selection)."contador_".$contador]["user_id"]=$selection[$key2]["user_id"];
                    $selectionItem[key($selection)."contador_".$contador]["tag_id"]=$selection[$key2]["tag_id"];
                    $selectionItem[key($selection)."contador_".$contador]["voto"]=$selection[$key2]["vote"];

                    $selectionItemTag[key($selection)."contador_".$recorrer]["user_id"]=$selection[$key2]["user_id"];
                    $selectionItemTag[key($selection)."contador_".$recorrer]["tag_id"]=$selection[$key2]["tag_id"];
                    $selectionItemTag[key($selection)."contador_".$recorrer]["voto"]=$selection[$key2]["vote"];
                 //   print_r ($selectionItem);
                  //  $selectionItem["tag_id"]=$selection[$key2]["tag_id"];
                //    echo "contador ".$contador."</br>";

                    if($contador==2){


                        break;
                    }

                //    echo $usuario->tag_id." es igual a ".$selection[$key2]["tag_id"]."</br>";
                }else{
               //     echo "no </br>";
                }



               /* if($contador<=2){

                if($usuario->tag_id==$selection[$key2]["tag_id"]){
                    echo $usuario->tag_id." es igual a".$selection[$key2]["tag_id"]."</br>";
                    echo "usuario: ".$selection[$key2]["user_id"]. " " ."tag_id: ".$selection[$key2]["tag_id"]. " " ."voto: ".$selection[$key2]["vote"]."prediccion: ".$selection[$key2]["prediccion"]." " ."</br>";
                    $contador++;

                }

                }else{
                    $contador=1;
                    echo "****************************************************************</br>";

                }*/

            }


        }
   // dd($selectionItem);
//COMPARAR LOS ITEM CON CUANTOS ITEM HAY
        foreach($selectionItemTag as $key=> $k){
        //    echo  "Primer arreglo".$k["tag_id"]."</br>";
        //    echo "******************************</br>";
            $contador=0;
            $variable1=array();
            $variable2=array();
            foreach($selectionItem as $key2=> $k2){
                echo  $k["tag_id"]." es igual a ".$k2["tag_id"]."</br>";
                if($k["tag_id"]==$k2["tag_id"]){
                    $contador++;

                    if($contador==1){

                        $variable1['user_id']=$k2["user_id"];
                        $variable1['tag_id']=$k2["tag_id"];
                        $variable1['voto']=$k2["voto"];

                    }elseif($contador==2){
                        $variable2['user_id']=$k2["user_id"];
                        $variable2['tag_id']=$k2["tag_id"];
                        $variable2['voto']=$k2["voto"];
                        $mediaAritmetica=(float)(1/2*($variable1['voto']+$variable2['voto']));
            /*            print_r($variable1);
                        print_r($variable2);
                        echo "</br>";
                        echo "Media aritmetica es: ".$mediaAritmetica;
                        echo "</br>";*/
                        $recomendacion[$k2["tag_id"]]["user_id"]=$idUser;
                        $recomendacion[$k2["tag_id"]]["tag_id"]=$k2["tag_id"];
                        $recomendacion[$k2["tag_id"]]["voto"]=$mediaAritmetica;
                        $contador=0;


                    }

                }


            }

        }

    }
    public function update(Request $request)
    {
         $votos = array();
         $filtroVotos = array();
         if($request->has("user")) {
         }

        $tag = Tag::all();
        $input = $request->input();

//        dd($input);

        $votos["_method"]="PATCH";
        $votos["_token"]=$request->input("_token");
        $votos["user_id"]=(integer)$request->input("user");

        $voting = Voting::all();
        $update =  new Voting();
        $filtroVoting = $voting->where('user_id',$votos["user_id"]);

     //   dd($filtroVoting);

        foreach($input as $key=> $i){

         //   echo $key. " es igual a " .$input[$key];
         //   echo "</br>";

            foreach($tag as $key2=> $t){
                //     echo $key. " es igual a " .$t->name_obj;
                //     echo "</br>";
                if($t->name_obj==$key) {
                    $votos['tag_id']=$t->id;
                    $votos['vote']=(integer)$input[$key];

                    foreach($filtroVoting as $key3=> $f){

                        if($votos['tag_id']==$f->tag_id){
                            Voting::find($f->id)->update($votos);
                        }
                    }
                }

            }
        }




       dd($votos);
         /*    foreach($tag as $key=> $t){

                 if($t->name_obj==$request->comida){



                 }





             }

             $idUser =$request->user;


             $voting = new Voting();
             $voting->createData($t);






         }*/

        dd($request->input("user"));

    }
    public function userRecomendacionKvecinos($recomendacion){



    }



}
