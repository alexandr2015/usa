<?php
namespace App\Repositories;

use App\Models\TimeZones;
use Bosnadev\Repositories\Contracts\RepositoryInterface;
use Bosnadev\Repositories\Eloquent\Repository;

class TimeZonesRepository extends Repository {

    public function model()
    {
        return TimeZones::class;
    }
}