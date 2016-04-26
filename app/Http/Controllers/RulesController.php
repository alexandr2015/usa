<?php

namespace App\Http\Controllers;

use App\Repositories\RulesRepository;
use App\Http\Requests\RulesRequest;

use App\Http\Requests;

class RulesController extends Controller
{
    protected $rulesRepository;

    public function __construct(RulesRepository $rulesRepository)
    {
        $this->rulesRepository = $rulesRepository;
    }

    public function create(RulesRequest $request)
    {
        if (true === ($response = $this->rulesRepository->create($request->only([
            'weekdays',
            'location',
            'all_year',
            'timezone_id',
            'dates'
        ])))) {
            return response()->json([
                'status' => true,
                'message' => 'rules successfully saved',
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => $response,
        ]);
    }
}
