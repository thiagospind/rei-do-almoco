<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\Vote;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VoteController extends Controller
{

    //Verifica se está no horário permitido para votação!
    public function isTimeVote(){
        $now = Carbon::now();
        $iniTime = Carbon::createFromTime(10,0,0);
        $endTime = Carbon::createFromTime(12,01,0);

        return $now->isBetween($iniTime,$endTime);
    }

    public function index(){
        $candidate = Candidate::paginate(1);
        $isTimeVote = $this->isTimeVote();
        return view('vote',compact('candidate','isTimeVote'));
    }

    public function store(Request $request){
        if($this->isTimeVote()) {
            try {
                $vote = new Vote();
                $date = new Carbon();
                $vote->candidate_id = $request->input('id');
                $vote->week_year = $date->weekOfYear;
                $vote->save();
                return redirect('/votar');
            } catch (\Exception $exception) {
                echo $exception;
            }
        }
    }

    public function closeVotation(){
        $votes = DB::table('vote')
            ->join('candidate','vote.candidate_id','=','candidate.id')
            ->select(DB::raw('count(*) as votes, candidate_id, time_vote, name, email'))
            ->whereDate('time_vote','=',Carbon::now()->toDateString())
            ->groupBy(DB::raw('date(time_vote), candidate_id'))
            ->orderBy('votes','desc')
            ->limit(1)
            ->get();
        echo $votes;
    }
}
