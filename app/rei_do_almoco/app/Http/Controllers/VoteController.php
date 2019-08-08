<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\Config;
use App\King;
use App\Mail\WinnerEmail;
use App\Vote;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class VoteController extends Controller
{

    public function index(){
        $candidate = Candidate::paginate(3);
        $isTimeVote = $this->isTimeVote();
        $config = Config::all();
        $weekVote = new WeekVoteController();
        $weekWinner = $weekVote->weekWinner();
        $minorVote = $weekVote->minorVotes();
        if($isTimeVote === "after"){
            $king = $this->lunchKing();
            $candidate = Candidate::find($king[0]->candidate_id);
            $votes = $king[0]->votes;
        }
        return view('vote',compact('candidate','isTimeVote','weekWinner','minorVote','config','votes'));
    }

    public function store(Request $request){
        if($this->isTimeVote()) {
            try {
                $vote = new Vote();
                $date = new Carbon();
                $vote->candidate_id = $request->input('id');
                $vote->week_year = $date->weekOfYear;
                $vote->save();
//                return redirect('/votar');
                return view('defaultMessage');
            } catch (\Exception $exception) {
                echo $exception;
            }
        }
    }

    //Verifica se está no horário permitido para votação!
    public function isTimeVote(){
        $now = Carbon::now();
        $config = Config::all();
        $start_time = $config[0]->start_time_vote;
        $end_time = $config[0]->end_time_vote;
        $iniTime = Carbon::createFromTime(substr($start_time,0,2),substr($start_time,3,2),0);
        $endTime = Carbon::createFromTime(substr($end_time,0,2),substr($end_time,3,2),0);

        if($now->isBetween($iniTime,$endTime) == true){
            return true;
        } else {
            if($iniTime->greaterThan($now)){
                return false;
            } else if ($endTime->lessThan($now)){
                return "after";
            }
        }
    }

    //Envia o email para o rei eleito no dia
    public function sendEmail($winVote){
        //$winVote = $this->lunchKing();

        if(isset($winVote) && count($winVote) > 0){
            Mail::to($winVote[0]->email)
            ->send(new WinnerEmail($winVote));
        }
    }

    public function storeKing(){
        try {
            $lunchKing = $this->lunchKing();
            $date = Carbon::now();
            $king = new King();
            $king->votes = $lunchKing[0]->votes;
            $king->date = $date->toDateString();
            $king->candidate_id = $lunchKing[0]->candidate_id;
            $king->week_year = $lunchKing[0]->week_year;
            $king->save();
            $this->sendEmail($lunchKing);
        }
        catch (\Exception $exception){
            echo $exception;
        }
    }

    public function lunchKing(){
        return DB::table('vote')
            ->join('candidate','vote.candidate_id','=','candidate.id')
            ->select(DB::raw('count(*) as votes, candidate_id, time_vote, name, email, week_year'))
            ->whereDate('time_vote','=',Carbon::now()->toDateString())
            ->groupBy(DB::raw('date(time_vote), candidate_id'))
            ->orderBy('votes','desc')
            ->limit(1)
            ->get();
    }
}
