<?php


namespace App\Http\Services;


interface ServiceInterface
{
    public function getAll();
    public function create($data);
    public function update($data,$id);
    public function delete($id);
    public function show($id);


}
