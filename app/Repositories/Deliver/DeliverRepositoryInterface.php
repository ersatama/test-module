<?php


namespace App\Repositories\Deliver;


interface DeliverRepositoryInterface
{
    public function getTypeById(int $id): array;
}
