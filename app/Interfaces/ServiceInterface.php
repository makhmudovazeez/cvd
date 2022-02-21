<?php


namespace App\Interfaces;


interface ServiceInterface
{
    public function findAll(array $filter);

    public function findOne(int $id);
}
