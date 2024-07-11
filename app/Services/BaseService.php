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

    public function update($request, $id)
    {
        DB::beginTransaction();
        try {
            $entity = $this->model::findOrFail($id);
            $entity->update($request->all());
            DB::commit();
            return $entity;
        } catch (Exception $e) {
            DB::rollBack();
            throw new CustomException("Erro: {$this->getModelName()} não cadastrado.");
        }
    }

    public function index($request)
    {
        $query = $this->model::query();
        if($request->has('active')){
            $active = filter_var($request->query('active'), FILTER_VALIDATE_BOOLEAN);
            $query->where('active', $active);
        }

        $entities = $query->get();

        if ($entities->isEmpty()) {
            throw new CustomException("Nenhum {$this->getModelNamePlural()} encontrado na plataforma.");
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
