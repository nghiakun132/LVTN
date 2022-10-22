<?php

namespace App\Repositories;

use App\Repositories\RepositoryInterface;

abstract class BaseRepository implements RepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->setModel();
    }

    abstract public function getModel();

    public function setModel()
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }
    public function getAll()
    {
        return $this->model->all();
    }

    public function findById($id)
    {
        $result = $this->model->find($id);

        return $result;
    }

    public function create($attributes = [])
    {
        return $this->model->create($attributes);
    }

    public function update($attributes = [], $id)
    {
        $result = $this->findById($id);
        if ($result) {
            $result->update($attributes);
            return true;
        }

        return false;
    }

    public function delete($id)
    {
        $result = $this->findById($id);
        if ($result) {
            $result->delete();

            return true;
        }

        return false;
    }

    public function getWithRelationship($relate)
    {
        return $this->model->with($relate)->get();
    }

    public function uploadFile($file, $path)
    {
        $fileName = $file->getClientOriginalName();
        $file->move('images/' . $path, $fileName);
        return $fileName;
    }

    public function insertGetId($attributes = [])
    {
        return $this->model->insertGetId($attributes);
    }

    public function whereGetAll(array $where)
    {
        return $this->model->where($where)->get();
    }
}
