<?php


namespace App\Repositories\ReceiverTemplate;

use App\Models\ReceiverTemplate\ReceiverTemplate;

class ReceiverTemplateRepositoryEloquent implements ReceiverTemplateRepositoryInterface
{
    public function all(): array
    {

        return ReceiverTemplate::all()->toArray();

    }

    public function getTemplateByName(string $name): array
    {

        return ReceiverTemplate::select('id','name','data')->where([['name',$name],['status',1]])->get()->toArray();

    }

}
