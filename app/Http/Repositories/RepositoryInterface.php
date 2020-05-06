<?php
namespace App\Http\Repositories;

interface RepositoryInterface {
    public function store(Array $inputs);
    public function getPaginate(int $nb);
    public function findById(int $id);
    public function update(int $id ,Array $inputs);
    public function delete(int $id);
}