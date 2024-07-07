<?php

namespace App\Services;

use App\Exceptions\CustomException;
use App\Models\User;
use Exception;
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

    public function index()
    {
        return parent::index();
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
