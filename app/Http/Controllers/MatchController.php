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
        $match->creator_user_id = \Auth::user()->id;
    	$match->save();
    	return redirect('/match/'.$match->id)->with('message', 'Partido creado exitosamente!');
    }

    public function directory() {
        $matches = \App\Match::orderBy('date', 'desc')->paginate(3);
		return view('matches.directory', ['matches' => $matches]);
	}

    public function myDirectory() {
        $matches = \App\Match::where('creator_user_id', '=', \Auth::user()->id)->orderBy('date', 'desc')->paginate(3);
        return view('matches.my-directory', ['matches' => $matches]);
    }

	public function show($id)
    {
    	$match = \App\Match::findOrFail($id);
    	return view('matches.show', ['match' => $match]);	
    }

    public function join($id)
    {
        $user2match = new \App\User2Match;
        $user2match->match_id = $id;
        $user2match->user_id = \Auth::user()->id;
        // valido que ya no haya estado registrado
        $user2matchExists = \App\User2Match::where('user_id', '=', $user2match->user_id)
            ->where('match_id', '=', $user2match->match_id)->get();
        if (count($user2matchExists)) {
            return redirect('/match/'.$id)->with('error', 'Ya estabas registrado en este pertido!');
        } else {
            $user2match->save();
            return redirect('/match/'.$id)->with('success', 'Has sido registrado exitosamente!');
        }
    }

    public function delete($id)
    {
        $match = \App\Match::findOrFail($id);
        if ($match->creator_user_id == \Auth::user()->id) {
            $match->delete();
            return redirect('/my-matches')->with('success', 'El partido ' . $match->title . ' ha sido eliminado exitosamente!');
        } else {
            return redirect('/my-matches')->with('error', 'No tienes permiso para eliminar el partido ' . $match->title  . '!');
        }
    }
}
