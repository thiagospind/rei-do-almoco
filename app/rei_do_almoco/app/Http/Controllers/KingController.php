<?php

namespace App\Http\Controllers;

use App\King;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class KingController extends Controller
{
    public function store(Collection $winVote)
    {
        $king = new King();
        $date = new Carbon();
        try {
            $king->votes = $winVote[0]->votes;
            $king->candidate_id = $winVote[0]->candidate_id;
            $king->week_year = $winVote[0]->week_year;
            $king->date = $date->toDateString();
            $king->save();
        }catch(\Exception $exception){

        }
    }
}
