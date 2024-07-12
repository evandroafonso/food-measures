<?php

namespace App\Services;

use App\Models\Product;
use Tymon\JWTAuth\Facades\JWTAuth;

class ProductService extends BaseService
{
    protected $unitMeasurementService;

    public function __construct()
    {
        parent::__construct(new Product());
    }

    public function create($data)
    {
        $user = JWTAuth::user();
        $data['user_id'] = $user->id;
        $product = parent::create($data);
        $product = Product::with('unitMeasurement')->find($product->id);


        return $product;
    }

    public function update($request, $id)
    {
        return parent::update($request, $id);
    }

    public function index($request)
    {
        return parent::index($request);
    }

    public function show($id)
    {
        return parent::show($id);
    }

    protected function getModelName()
    {
        return 'Produto';
    }

    protected function getModelNamePlural()
    {
        return 'Produtos';
    }
}
