<?php

namespace App\Providers;

use App\Helpers\DateHelper;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('dates_array', function ($attribute, $value, $parameters, $validator) {
            foreach ($value as $item) {
                if (!isset($item['date_from']) || !isset($item['date_to'])) {
                    return false;
                }
                if (!DateHelper::checkDate($item['date_from']) || !DateHelper::checkDate($item['date_to'])) {
                    dd('here');
                    return false;
                }
                if (!DateHelper::validatePeriods($value, $item)) {
                    return false;
                }
                $dateFrom = strtotime($item['date_from']);
                if (!checkdate(date('m', $dateFrom), date('d', $dateFrom), date('Y', $dateFrom))) {
                    return false;
                }

                if ($item['date_from'] > $item['date_to']) {
                    return false;
                }
            }

            return true;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
