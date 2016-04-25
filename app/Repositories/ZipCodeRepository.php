<?php
namespace App\Repositories;

use App\Models\ZipCode;
use Bosnadev\Repositories\Contracts\RepositoryInterface;
use Bosnadev\Repositories\Eloquent\Repository;

class TimeZonesRepository extends Repository {

    public function model()
    {
        return ZipCode::class;
    }
}