<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class County extends Model
{
    use SoftDeletes;
    
    protected $visible = [
        'id',
        'name',
        'fips',
    ];

    protected $fillable = [
        'state_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
