<?php


namespace App\Repositories\Template;

use Auth;
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
    		$temp = new template;
    		$temp->user = Auth::id();
    		$temp->name = $template['name'];
    		$temp->data = json_encode($sender);
    		$temp->status = 1;
    		$temp->save();
    	}

    	// 


    }

    public function getTemplateByName(string $name): array
    {

        return template::select('id','name','data')->where([['name',$name],['status',1]])->get()->toArray();

    }

}
