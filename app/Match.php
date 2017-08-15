<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    protected $table = 'matches';
    protected $fillable = ['title', 'field', 'number_of_players', 'date'];
    protected $guarded = ['id'];

    public function creator()
    {
        return $this->hasOne('App\User', 'id', 'creator_user_id');
    }

    public function players()
    {
        return $this->belongsToMany('App\User', 'user2match');
    }
}
