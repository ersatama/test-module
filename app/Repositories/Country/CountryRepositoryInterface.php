<?php


namespace App\Repositories\Country;


interface CountryRepositoryInterface
{
    public function all(): array;

    public function cities(): array;
}
