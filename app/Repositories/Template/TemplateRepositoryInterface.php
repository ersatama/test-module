<?php


namespace App\Repositories\Template;


interface TemplateRepositoryInterface
{
    public function all(): array;

    public function save(array $template, array $sender): void; 

    public function getTemplateByName(string $name): array;
}
