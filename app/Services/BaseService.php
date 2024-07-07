<?php

namespace App\Services;

use App\Exceptions\CustomException;
use Illuminate\Support\Facades\DB;
use Exception;

abstract class BaseService
{
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function create($data)
    {
        DB::beginTransaction();
        try {
            $entity = $this->model::create($data);
            DB::commit();
            return $entity;
        } catch (Exception $e) {
            DB::rollBack();
            throw new CustomException("Erro: {$this->getModelName()} não cadastrado.");
        }
    }

    public function index()
    {
        $entities = $this->model::all();
        if ($entities->isEmpty()) {
            throw new CustomException("Erro: Nenhuma {$this->getModelNamePlural()} cadastrada na plataforma.");
        }
        return $entities;
    }

    public function show($id)
    {
        $entity = $this->model::find($id);
        if (!$entity) {
            throw new CustomException("Erro: Não foi encontrado {$this->getModelName()} com id {$id}");
        }
        return $entity;
    }


    abstract protected function getModelName();
    abstract protected function getModelNamePlural();


}
