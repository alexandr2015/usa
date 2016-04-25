<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class State extends Model
{
    use SoftDeletes;

    protected $visible = [
        'id',
        'name',
        'code',
        'fips',
//        'areacode',
//
    ];

    protected $fillable = [
        'id',
        'name',
        'code',
        'fips',
//        'areacode',
//        'msa',
        'country_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function counties()
    {
        return $this->hasMany(County::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
