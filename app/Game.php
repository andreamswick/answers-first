<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Game extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'questions'];

    protected $casts = ['questions' => 'json'];
    
    /**
     * Get the user that owns the game.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
