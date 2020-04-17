<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MalariaTest extends Model
{
    public function patient(){
        return $this->belongsTo('App\Patient','patient_id');
   }
   public function doctor(){
    return $this->belongsTo('App\User','user_id');
} 
public function getResult(){
    if($this->prediction==1){
        return "uninfected";
    }else
    return "parasitized";

}
}
