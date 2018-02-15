<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model {

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description'
    ];

    /**
     * A destination has may images and videos.
     *
     * @return HasMany
     */
    public function media()
    {
        return $this->hasMany('App\DestinationMedia');
    }

}
