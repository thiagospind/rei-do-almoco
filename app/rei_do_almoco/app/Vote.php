<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $table = 'vote';

    public function candidate(){
        return $this->belongsTo('App\Candidate','candidate_id','id');
    }
}
