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

    public function getCountryById(int $id): array
    {
        return country::select('id','short_name','name','russian_name','kazakh_name')
            ->where('id',$id)
            ->first()
            ->toArray();
    }

    public function getCountriesByIds(array $countryIds):array {
        return country::whereIn('id', $countryIds)->get()->toArray();
    }

}
