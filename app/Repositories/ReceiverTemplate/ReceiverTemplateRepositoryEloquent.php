<?php


namespace App\Repositories\ReceiverTemplate;

use App\Models\ReceiverTemplate\ReceiverTemplate;

class ReceiverTemplateRepositoryEloquent implements ReceiverTemplateRepositoryInterface
{
    public function all(): array
    {
        return ReceiverTemplate::all()->toArray();
    }

    public function save(array $receiver): void {
        foreach($receiver as &$value) {
            if ($value['saveTemplate']) {
                $count = ReceiverTemplate::where('name','=',$value['template'])->count();
                if ($count === 1) {
                    ReceiverTemplate::where('name','=',$value['template'])->update(['data' => json_encode($value),'status' => 1]);
                } else {
                    $receiver = new ReceiverTemplate;
                    $receiver->name = $value['template'];
                    $receiver->data = json_encode($value);
                    $receiver->status = 1;
                    $receiver->save();
                }
            }
        }
    }

    public function getTemplateByName(string $name): array
    {
        return ReceiverTemplate::select('id','name','data')->where([['name',$name],['status',1]])->get()->toArray();
    }

}
