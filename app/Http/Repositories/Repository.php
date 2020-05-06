<?php
namespace App\Http\Repositories;

abstract class Repository implements RepositoryInterface
{
    protected $model;

    public function store(Array $inputs)
    {

        $this->model->create($inputs);
    }

    public function getPaginate( int $nb)
    {
        return $this->model->paginate($nb);
    }

    public function findById(int $id)   
    {
        return $this->model->findOrFail($id);
    }

    public function update(int $id ,Array $inputs)
    {
        $this->findById($id)->update($inputs);
    }

    public function delete(int $id)
    {
        $this->findById($id)->delete();
    }
}
