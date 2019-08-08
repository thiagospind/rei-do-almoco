<?php

namespace App\Http\Controllers;

use App\WeekVote;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WeekVoteController extends Controller
{
    public function weekWinner(){
        $date = new Carbon();
        $week = $date->weekOfYear;

        return DB::table('vw_king')
            ->select('A.votes', 'vw_king.week_year', 'candidate_id', 'name', 'email', 'picture')
            ->join(DB::raw('(select max(votes) as votes, week_year from vw_king group by week_year) A'),function ($join)
            {
                $join->on('vw_king.votes','=','A.votes')
                     ->on('vw_king.week_year','=','A.week_year');
            })
            ->join('candidate','candidate.id','=','vw_king.candidate_id')
            ->where('vw_king.week_year','<',$week)
            ->orderBy('vw_king.week_year','desc')
            ->limit(5)
            ->get();
    }

    public function minorVotes(){
        $date = new Carbon();
        $week = $date->weekOfYear;

        return DB::table('vw_vote')
            ->select('qtd', 'vw_vote.week_year', 'candidate_id', 'name', 'email', 'picture')
            ->join(DB::raw('(select min(qtd) as quant, week_year from vw_vote group by week_year) A'),function ($join)
            {
                $join->on('vw_vote.qtd','=','A.quant')
                    ->on('vw_vote.week_year','=','A.week_year');
            })
            ->join('candidate','candidate.id','=','vw_vote.candidate_id')
            ->where('vw_vote.week_year','<',$week)
            ->orderBy('vw_vote.week_year','desc')
            ->limit(5)
            ->get();
    }
}
