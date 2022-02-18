<?php


namespace App\Interfaces;


interface ServiceInterface
{
    public function findAll(array $filter): array;

    public function findOne(int $id): array;
}
