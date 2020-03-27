<?php


namespace App\Repositories\City;

use App\Models\City\city;

class CityRepositoryEloquent implements CityRepositoryInterface
{
    public function all(): array
    {

        return city::all()->toArray();

    }

    public function getCitiesByCountryId(int $id): array
    {

        return city::select('id','country_id','name','russian_name','kazakh_name')->where('country_id',$id)->get()->toArray();

    }

}
