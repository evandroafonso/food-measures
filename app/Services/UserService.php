<?php

namespace App\Services;

use App\Models\User;

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
