<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoardGame extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'bg_boardgames';

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['players', 'duration'];

    /**
     * The type of game.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function type()
    {
        return $this->hasOne('App\Models\Type', 'id_type', 'fk_id_type');
    }

    /**
     * Get the number of players.
     *
     * @return array
     */
    public function getPlayersAttribute()
    {
        return [
            'min' => $this->attributes['min_players'],
            'max' => $this->attributes['max_players'],
        ];
    }

    /**
     * Get the duration of the game.
     *
     * @return array
     */
    public function getDurationAttribute()
    {
        return [
            'min' => $this->attributes['min_duration'],
            'max' => $this->attributes['max_duration'],
        ];
    }
}
