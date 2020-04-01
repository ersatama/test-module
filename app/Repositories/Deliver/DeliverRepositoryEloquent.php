<?php


namespace App\Repositories\Deliver;

use App\Models\Deliver\deliver;

class DeliverRepositoryEloquent implements DeliverRepositoryInterface
{
    public function getTypeById(int $code): array
    {
        return deliver::select('id','code','name','russian_name','kazakh_name')
            ->where('code',$code)
            ->first()
            ->toArray();
    }
}
