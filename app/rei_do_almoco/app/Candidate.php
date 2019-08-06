<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $table = 'candidate';

    public function vote(){
        return $this->hasMany('App\Vote','candidate_id','id');
    }
}
