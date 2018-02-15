<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class TripItem extends Model {

    use Notifiable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'trip_items';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

}
