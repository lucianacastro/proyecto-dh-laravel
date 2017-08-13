<?php

namespace App\Http\Controllers;

use App\Http\Requests\MatchForm;

use Illuminate\Http\Request;

class MatchController extends Controller
{
    public function create() 
    {
    	return view('matches.create');
    }

    public function store(MatchForm $matchForm)
    {
    	$match = new \App\Match;
    	$match->title = \Request::input('title');
    	$match->field = \Request::input('field');
    	$match->number_of_players = \Request::input('number_of_players');
    	$match->date = \Request::input('date');
    	$match->save();
    	return redirect('match/create')->with('message', 'Match saved');
    }
}
