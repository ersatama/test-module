<?php


namespace App\Repositories\ReceiverTemplate;


interface ReceiverTemplateRepositoryInterface
{
    public function all(): array;

    public function save(array $receiver): void;

    public function getTemplateByName(string $name): array;
}
