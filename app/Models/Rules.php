<?php

namespace App\Models;

use App\Helpers\DateHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rules extends Model
{
    use SoftDeletes;

    protected $visible = [
        'id',
        'location',
        'state_id',
        'timezone_id',
        'all_year',
        'weekdays',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $casts = [
        'all_year' => 'boolean',
    ];

    public function rules_dates()
    {
        return $this->belongsTo(RulesDates::class);
    }

    public function getWeekdaysAttribute($value)
    {
        return DateHelper::getWeekDayByNumber($value[0]) . '-' . DateHelper::getWeekDayByNumber($value[2]);
    }
}
