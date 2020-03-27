<?php


namespace App\Repositories\City;


interface CityRepositoryInterface
{
    public function all(): array;

    public function getCitiesByCountryId(int $id): array;
}
