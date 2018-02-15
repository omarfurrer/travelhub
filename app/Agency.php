<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Agency extends Model {

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'address', 'gmaps_url', 'contact_phone', 'fb_url', 'website_url', 'logo_path', 'doe'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'doe'
    ];

    /**
     * An agency has many users maintaining it. 
     *
     * @return BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('App\User')->withPivot('role')->withTimestamps();
    }

    /**
     * An agency has many trips.
     *
     * @return HasMany
     */
    public function trips()
    {
        return $this->hasMany('App\Trip');
    }

}
