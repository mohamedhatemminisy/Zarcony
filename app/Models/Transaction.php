<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function sender(){
    	return $this->belongsTo('App\Models\User' , 'sender_id'); 
    }


    public function receiver(){
    	return $this->belongsTo('App\Models\User' , 'receiver_id'); 
    }

    public function getStatus(){
        return  $this -> sender_id   == Auth()->user()->id ?  'Sender'   : 'Receiver' ;
    }

}
