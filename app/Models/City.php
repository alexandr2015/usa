<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use SoftDeletes;
    
    protected $visible = [
        'id',
        'name',
        'type',
        'zipcode',
        'zipcode_type',
        'timezone_id',
        'county_id',
        'latitude',
        'longitude',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    
    public function county()
    {
        return $this->belongsTo(County::class);
    }

    public function timezone()
    {
        return $this->belongsTo(Timezone::class);
    }
}
