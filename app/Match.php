<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    protected $table = 'matches';
    protected $fillable = ['title', 'field', 'number_of_players', 'date'];
    protected $guarded = ['id'];
}
