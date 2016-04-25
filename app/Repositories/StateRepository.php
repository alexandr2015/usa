<?php
namespace App\Repositories;

use App\Exceptions\ApiException;
use Symfony\Component\HttpFoundation\Response;
use App\Models\State;


class StateRepository extends BaseRepository {

    public function model()
    {
        return State::class;
    }

    public function delete($id, $throwErrorIfDeleteFalse = false)
    {
        $state = $this->find($id);// has
        if (count($state->timeZones) > 0) {
            throw new ApiException('You can not remove the state, you must first remove time zones', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        return parent::delete($id);
    }
}