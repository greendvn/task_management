<?php


namespace App\Http\Repositories;


interface RepoInterface
{
    public function getAll();
    public function create($data);
    public function update($data,$id);
    public function delete($id);
    public function show($id);

}
