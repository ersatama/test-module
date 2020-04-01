<?php


namespace App\Repositories\Template;

use Illuminate\Support\Facades\Auth;
use App\Models\Template\template;

class TemplateRepositoryEloquent implements TemplateRepositoryInterface
{
    public function all(): array
    {

        return template::all()->toArray();

    }

    public function save(array $template, array $sender): void
    {

    	if ($template['save']) {
            $count = template::where('name','=',$template['name'])->count();
            if ($count === 1) {
                template::where('name','=',$template['name'])->update(['data' => json_encode($sender), 'status' => 1]);
            } else {
                $temp = new template;
                $temp->user = Auth::id();
                $temp->name = $template['name'];
                $temp->data = json_encode($sender);
                $temp->status = 1;
                $temp->save();
            }
    	}

    }

    public function getTemplateByName(string $name): array
    {

        return template::select('id','name','data')->where([['name',$name],['status',1]])->get()->toArray();

    }

}
