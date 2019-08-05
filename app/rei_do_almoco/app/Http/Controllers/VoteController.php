<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\Vote;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
        $candidate = Candidate::paginate(8);
        return view('vote',compact('candidate'));
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
}
