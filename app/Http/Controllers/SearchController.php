<?php

namespace App\Http\Controllers;

use App\Helpers\DateHelper;
use App\Models\City;
use App\Repositories\RulesDatesRepository;
use App\Http\Requests\SearchRequest;
use Symfony\Component\HttpFoundation\Response;

class SearchController extends Controller
{
    protected $rulesDatesRepository;

    public function __construct(RulesDatesRepository $rulesDatesRepository)
    {
        $this->rulesDatesRepository = $rulesDatesRepository;
    }

    public function search(SearchRequest $request, City $city)
    {
        $dateFrom = $request->get('day_from');
        $dateTo = $request->get('day_to');
        $rule = $city->timezone->rule;
        if (!$rule) {
            $rule = $city->county->state->rule;
            if (!$rule) {
                return response()->json([
                    'success' => true,
                    'dates' => DateHelper::getWeekDaysFromPeriods([
                        [$dateFrom, $dateTo]
                    ]),
                ]);
            }
        }
        $rulesDates = $rule->rules_dates;
        if ($rulesDates->isEmpty()) {
            if ($rule->all_year) {
                return response()->json([
                    'success' => true,
                    'dates' => DateHelper::getWeekDaysFromPeriods([
                        [$dateFrom, $dateTo]
                    ]),
                ]);
            }
        }

        $response = $this->rulesDatesRepository->periods($rulesDates, $rule, $dateFrom, $dateTo);

        return response()->json([
            'success' => true,
            'dates' => $response,
        ], Response::HTTP_OK);
    }
}
