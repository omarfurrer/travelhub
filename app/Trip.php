<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model {

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'start_date', 'end_date', 'type', 'extra_details', 'price_per_person', 'currency', 'deadline_date', 'external', 'agency_id'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'external' => 'boolean'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'start_date',
        'end_date',
        'deadline_date'
    ];

    /**
     * A trip has may images and videos.
     *
     * @return HasMany
     */
    public function media()
    {
        return $this->hasMany('App\TripMedia');
    }

    /**
     * A trip can have included or excluded addons.
     *
     * @return BelongsToMany
     */
    public function items()
    {
        return $this->belongsToMany('App\TripItem', 'item_trip')->withPivot('order', 'included', 'extra_details')->withTimestamps();
    }

    /**
     * A trip can have many destinations.
     *
     * @return BelongsToMany
     */
    public function destinations()
    {
        return $this->belongsToMany('App\Destination')->withPivot('order', 'extra_details', 'start_date', 'end_date')->withTimestamps();
    }

}
