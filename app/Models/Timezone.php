<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Timezone extends Model
{
    use SoftDeletes;
    
    protected $visible = [
        'id',
        'name',
        'gmtoffset',
    ];

    protected $fillable = [
        'id',
        'name',
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

    public function rule()
    {
        return $this->hasOne(Rules::class);
    }
}
