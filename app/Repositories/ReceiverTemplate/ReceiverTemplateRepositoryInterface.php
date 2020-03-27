<?php


namespace App\Repositories\ReceiverTemplate;


interface ReceiverTemplateRepositoryInterface
{
    public function all(): array;

    public function getTemplateByName(string $name): array;
}
