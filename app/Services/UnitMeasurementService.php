<?php

namespace App\Services;

use App\Exceptions\CustomException;
use App\Models\UnitMeasurement;
use Exception;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Facades\JWTAuth;

class UnitMeasurementService extends BaseService
{
    public function __construct()
    {
        parent::__construct(new UnitMeasurement());
    }

    public function create($data)
    {
        $user = JWTAuth::user();
        $data['user_id'] = $user->id;
        return parent::create($data);
    }

    public function index($request)
    {
        return parent::index($request);
    }

    protected function getModelName()
    {
        return 'Unidade de Medida';
    }

    protected function getModelNamePlural()
    {
        return 'Unidades de Medida';
    }
}
