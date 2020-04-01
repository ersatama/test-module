<?php


namespace App\Repositories\OrderReceiver;


interface OrderReceiverRepositoryInterface
{

    public function save(int $id, array $receiver): void;

    public function getOrderReceiverById(int $id): array;

}
