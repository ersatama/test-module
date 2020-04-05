<?php


namespace App\Repositories\Order;


interface OrderRepositoryInterface
{
    public function all(int $page): array;

    public function save(array $data): int;

    public function getOrderById(int $id): array;
}
