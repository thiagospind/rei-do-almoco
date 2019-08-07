<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\Mail\WinnerEmail;
use App\Vote;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class VoteController extends Controller
{

    public function index(){
        $candidate = Candidate::paginate(4);
        $isTimeVote = $this->isTimeVote();
        $winner = new WeekVoteController();
        $weekWinner = $winner->weekWinner();
        return view('vote',compact('candidate','isTimeVote','weekWinner'));
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

    //Verifica se está no horário permitido para votação!
    public function isTimeVote(){
        $now = Carbon::now();
        $iniTime = Carbon::createFromTime(10,0,0);
        $endTime = Carbon::createFromTime(12,01,0);

        return $now->isBetween($iniTime,$endTime);
    }

    public function closeVotation(){
        $winVote = DB::table('vote')
            ->join('candidate','vote.candidate_id','=','candidate.id')
            ->select(DB::raw('count(*) as votes, candidate_id, time_vote, name, email, week_year'))
            ->whereDate('time_vote','=',Carbon::now()->toDateString())
            ->groupBy(DB::raw('date(time_vote), candidate_id'))
            ->orderBy('votes','desc')
            ->limit(1)
            ->get();

        if(isset($winVote) && count($winVote) > 0){
            Mail::to($winVote[0]->email)
            ->send(new WinnerEmail($winVote));
        }
    }
}
