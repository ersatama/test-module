<?php

namespace App\Http\Controllers;


use App\Comments;
use App\Module;
use App\User;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function userId()
    {
        return Auth::user();
    }

    public function home()
    {
        $this->create();
        return view('home.home');
    }

    public function all()
    {
        $comments   =   Module::with('comments')->get();
        $i          =   0;
        foreach ($comments as &$comment) {
            $comment['audio']   =   [
                'status'    =>  false,
            ];
            $comment['comment'] =   [
                'status'    =>  true,
                'text'      =>  '',
                'to'        =>  null,
                'audio'     =>  '/audio/save/'.($i++).'/'.$comment['id']
            ];
            foreach ($comment['comments'] as &$item) {
                $item['user']   =   User::where(User::ID,$item[Comments::USER_ID])->first()->toArray();
                if ($item[Comments::COMMENT_ID]) {
                    $item[Comments::COMMENT_ID] =   Comments::with('user')->where(Comments::ID,$item[Comments::COMMENT_ID])->first()->toArray();
                }
            }
        }
        return $comments;
    }

    public function newComment(Request $request)
    {
        $id         =   $request->input('id');
        $comment    =   $request->input('comment');
        $to         =   $request->input('to');

        Comments::create([
            Comments::MODULE_ID     =>  $id,
            Comments::COMMENT_ID    =>  $to,
            Comments::USER_ID       =>  Auth::id(),
            Comments::COMMENT       =>  $comment
        ]);
        return $this->comments($id);
    }

    public function comments($id)
    {
        $comments   =   Comments::with('user')
            ->where(Comments::MODULE_ID,$id)
            ->get()
            ->toArray();

        foreach ($comments as &$comment) {
            if ($comment[Comments::COMMENT_ID]) {
                $comment[Comments::COMMENT_ID]  =   Comments::with('user')->where(Comments::ID,$comment[Comments::COMMENT_ID])->first()->toArray();
            }
        }
        return $comments;
    }

    public function create():void
    {
        $module =   Module::get()->toArray();
        if (sizeof($module) === 0) {
            User::create([
                'name'      =>  'Admin',
                'type'      =>  2,
                'email'     =>  'admin@test.ru',
                'password'  =>  Hash::make('qwerty00')
            ]);
            $arr    =   [
                [
                    'title' =>  'Марафон 1',
                    'date'  =>  date('Y-m-d')
                ],
                [
                    'title' =>  'Марафон 2',
                    'date'  =>  date('Y-m-d',strtotime('-1 day'))
                ],
                [
                    'title' =>  'Марафон 3',
                    'date'  =>  date('Y-m-d',strtotime('-2 day'))
                ],
                [
                    'title' =>  'Марафон 4',
                    'date'  =>  date('Y-m-d',strtotime('-3 day'))
                ]
            ];

            foreach ($arr as &$item) {
                Module::create([
                    Module::TITLE   =>  $item['title'],
                    Module::DATE    =>  $item['date']
                ]);
            }
        }
    }

    public function saveAudioComment($item, $id, $comment, Request $request)
    {
        $finalUrl   =   $this->newAudio($request);
        return ['id'=>$item,'comments' => $this->audioCommentTo($id,$comment,$finalUrl)];
    }

    public function newAudio($request)
    {
        $url    =   '';
        if ($request->hasFile('audio')) {
            $audio      =   $request->file('audio');
            $time       =   time();
            $path       =   '/public/'.$time.'/';
            $file       =   Storage::disk('local')->put($path,$audio,'public');
            $fileName   =   pathinfo($file,PATHINFO_FILENAME);
            $url        =   'storage/'.$time.'/'.$fileName.'.'.$audio->guessClientExtension();
        }
        return $url;
    }

    public function saveAudio($item, $id,Request $request)
    {
        $finalUrl   =   $this->newAudio($request);
        return ['id'=>$item,'comments' => $this->audioComment($id,$finalUrl)];
    }

    public function audioCommentTo(int $id, int $comment, string $finalUrl)
    {
        Comments::create([
            Comments::MODULE_ID     =>  $id,
            Comments::COMMENT_ID    =>  $comment,
            Comments::USER_ID       =>  Auth::id(),
            Comments::AUDIO         =>  $finalUrl
        ]);
        return $this->comments($id);
    }

    public function audioComment(int $id, string $finalUrl)
    {
        Comments::create([
            Comments::MODULE_ID =>  $id,
            Comments::USER_ID   =>  Auth::id(),
            Comments::AUDIO     =>  $finalUrl
        ]);
        return $this->comments($id);
    }
}
