<?php

namespace App\Http\Controllers;

use App\Repositories\CityRepository;
use Illuminate\Http\Request;

use App\Http\Requests;

class SearchController extends Controller
{
    protected $cityRepository;

    public function __construct(CityRepository $cityRepository)
    {
        $this->cityRepository = $cityRepository;
    }

    public function search($postCode)
    {
        $city = $this->cityRepository->findBy('zipcode', $postCode);

        return response()->json($city);
    }
}
