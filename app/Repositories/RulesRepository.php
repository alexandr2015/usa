<?php
namespace App\Repositories;

use App\Exceptions\RulesException;
use App\Models\Rules;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;
class RulesRepository extends BaseRepository {

    public function model()
    {
        return Rules::class;
    }

    public function create(array $data, $throwErrorIfDeleteFalse = false)
    {
        $dates = $data['dates'];
        unset($data['dates']);
        DB::beginTransaction();
        try {
            $model = parent::create($data, $throwErrorIfDeleteFalse);
            if ($dates) {
                foreach ($dates as $date) {
                    $response = $model->rules_dates()->create([
                        'date_from' => $date['date_from'],
                        'date_to' => $date['date_to'],
                        'include' => !$model->all_year,
                    ]);
                    if (!$response) {
                        throw new RulesException('Rules not saved');
                    }
                }
            }
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            if ($e instanceof RulesException) {
                return $e->getMessage();
            }
            return 'Something went wrong';
        }
    }
}