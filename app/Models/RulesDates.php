<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RulesDates extends Model
{
    use SoftDeletes;

    protected $visible = [
        'id',
        'rules_id',
        'date_from',
        'date_to',
        'include',
    ];

    protected $fillable = [
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
        'include' => 'boolean',
    ];

    public function rule()
    {
        return $this->belongsTo(Rules::class);
    }
}
