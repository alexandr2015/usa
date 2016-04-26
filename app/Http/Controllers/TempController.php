<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\County;
use App\Models\Rules;
use App\Models\State;
use App\Models\Timezone;
use App\Models\Usa;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class TempController extends Controller
{
    public function index()
    {
        $rules = Rules::find(1);
        return response()->json($rules);
    }









//    public function index()
//    {
//        $model = Usa::distinct()->select(['county', 'city', 'citytype', 'zipcode', 'zipcodetype', 'latitude', 'longitude', 'timezone'])
//            ->limit(1000)
//            ->offset(0)
//            ->get();

//        DB::table('usa')->distinct('city')->select(
//            ['county', 'city', 'citytype', 'zipcode', 'zipcodetype', 'latitude', 'longitude', 'timezone']
//        )->chunk(100, function($models) {
//            foreach ($models as $item) {
//                $timezone = Timezone::where('name', '=', $item->timezone)->first();
//                $county = County::where('name', '=', $item->county)->first();
////                var_dump($timezone->id, $county->id);
//                try {
//                    $c = new City();
//                    $c->name = $item->city;
//                    $c->type = $item->citytype;
//                    $c->zipcode = $item->zipcode;
//                    $c->zipcode_type = $item->zipcodetype;
//                    $c->timezone_id = $timezone->id;
//                    $c->county_id = $county->id;
//                    $c->latitude = $item->latitude;
//                    $c->longitude = $item->longitude;
//                    $c->save();
//                } catch (\Exception $e) {
//                    echo $e->getMessage() . "\n";
//                }
//            }
//        });
//        var_dump(count($model));

//    }
//    public function index()
//    {
//        $model = Usa::distinct()->select(['timezone', 'gmtoffset'])->get();
//        foreach ($model as $item) {
//            $tm = new Timezone();
//            $tm->name = $item->timezone;
//            $tm->gmtoffset = $item->gmtoffset;
//            $tm->save();
//        }
//    }

    //$model = Usa::distinct()->select(['county', 'city', 'citytype', 'zipcode', 'zipcodetype', 'latitude', 'longitude'])->get();

//    public function index()
//    {
//        $model = Usa::distinct()->select(['county', 'countyfips', 'state'])->get();
//        foreach ($model as $item) {
//            $state = State::where('name', '=', $item['state'])->first();
//            $stateId = $state->id;
//            $county = new County();
//            $county->name = $item->county;
//            $county->fips = $item->countyfips;
//            $county->state_id = $stateId;
//            $county->save();
//        }
//
//    }

//    public function index()
//    {
//        $model = Usa::distinct()->select(['state', 'statecode', 'statefips'])->get();
//        var_dump(count($model));
//        foreach ($model as $item) {
//            $state = new State();
//            $state->name = $item->state;
//            $state->fips = $item->statefips;
//            $state->code = $item->statecode;
//            $state->country_id = 1;
//            $state->save();
//        }
//    }
}
