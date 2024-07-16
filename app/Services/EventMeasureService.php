<?php

namespace App\Services;

use App\Models\EventMeasure;
use Tymon\JWTAuth\Facades\JWTAuth;

class EventMeasureService extends BaseService
{
    protected $eventMeasureService;

    public function __construct()
    {
        parent::__construct(new EventMeasure());
    }

    public function create($data)
    {
        $user = JWTAuth::user();
        $data['user_id'] = $user->id;
        $eventMeasure = parent::create($data);
        $product = EventMeasure::with('unitMeasurement')->find($eventMeasure->id);
        return $product;
    }

    protected function getModelName()
    {
        return 'cálculo de medidas do produto';
    }

    protected function getModelNamePlural()
    {
        return 'cálculo de medidas do produto';
    }

}
