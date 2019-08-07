<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WeekVote extends Model
{
    //Classe de acesso à view que mostra quem foram os vencedores das semanas anteriores!
    protected $table = 'vw_vote';
}
