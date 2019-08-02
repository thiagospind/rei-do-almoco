<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\Vote;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function index(){
        $candidate = Candidate::paginate(4);
        return view('vote',compact('candidate'));
    }

    public function store(Request $request){

        try {
            $vote = new Vote();
            $date = new Carbon();
            $vote->candidate_id = $request->input('id');
            $vote->week_year = $date->weekOfYear;
            $vote->save();
            return redirect('/votar');
        } catch(\Exception $exception){
            echo $exception;
        }
    }
}
