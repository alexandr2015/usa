<?php
namespace App\Repositories;

use App\Helpers\DateHelper;
use App\Models\RulesDates;

class RulesDatesRepository extends BaseRepository {

    public function model()
    {
        return RulesDates::class;
    }

    public function periods($rulesDates, $rule, $dateFrom, $dateTo)
    {
        $response = [];
        foreach ($rulesDates as $dates) {
            if ($rule->all_year) {
                $validDates = DateHelper::getPeriodForIncludeTrue($dates, $dateFrom, $dateTo);
            } else {
                $validDates = DateHelper::getPeriodForIncludeFalse($dates, $dateFrom, $dateTo);
            }
            $response = array_merge(DateHelper::getWeekDaysFromPeriods($validDates, $rule['weekdays']), $response);;
        }

        return $response;
    }
}