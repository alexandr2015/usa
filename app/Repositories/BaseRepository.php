<?php
namespace App\Repositories;

use App\Exceptions\ApiException;
use Symfony\Component\HttpFoundation\Response;
use Bosnadev\Repositories\Eloquent\Repository;

abstract class BaseRepository extends Repository
{
    public function find($id, $columns = ['*'])
    {
        $result = parent::find($id, $columns);
        if (!$result) {
            throw new ApiException(Response::$statusTexts[Response::HTTP_NOT_FOUND], Response::HTTP_NOT_FOUND);
        }

        return $result;
    }

    public function update(array $data, $id, $throwErrorIfDeleteFalse = false)
    {
        $result = parent::update($data, $id, 'id');
        if ($throwErrorIfDeleteFalse && !$result) {
            throw new ApiException('Something went wrong. Data is not updated', Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return $result;
    }

    public function create(array $data, $throwErrorIfDeleteFalse = false)
    {
        $result = parent::create($data);
        if ($throwErrorIfDeleteFalse && !$result) {
            throw new ApiException('Something went wrong. Data is not created', Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return $result;
    }

    public function delete($id, $throwErrorIfDeleteFalse = false)
    {
        $result = parent::delete($id);
        if ($throwErrorIfDeleteFalse && !$result) {
            throw new ApiException('Something went wrong. Data is not removed', Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return $result;
    }
}