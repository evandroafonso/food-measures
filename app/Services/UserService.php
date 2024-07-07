<?php

namespace App\Services;

use App\Exceptions\CustomException;
use App\Models\User;
use Exception;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\DB;

class UserService extends BaseService
{
    public function __construct()
    {
        parent::__construct(new User());
    }

    public function create($data)
    {
        return parent::create($data);
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
        return 'Usuário';
    }

    protected function getModelNamePlural()
    {
        return 'Usuários';
    }

}
