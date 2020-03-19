<?php


namespace App\Repositories\Country;

use App\Models\Country\country;

class CountryRepositoryEloquent implements CountryRepositoryInterface
{
    public function all(): array
    {

        return country::all()->toArray();

    }

    public function cities(): array
    {

        return country::all()->cities()->get();

    }

}
