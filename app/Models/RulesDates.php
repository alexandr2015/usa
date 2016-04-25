<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RulesDates extends Model
{
    use SoftDeletes;

    protected $visible = [
        'rules_id',
        'date_from',
        'date_to',
        'include',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $casts = [
        'include',
    ];

    public function rule()
    {
        return $this->belongsTo(Rules::class);
    }
}
