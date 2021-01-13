<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    const TABLE         =   'comments';
    const ID            =   'id';
    const COMMENT_ID    =   'comment_id';
    const MODULE_ID     =   'module_id';
    const USER_ID       =   'user_id';
    const COMMENT       =   'comment';
    const AUDIO         =   'audio';

    protected $fillable =   [
        self::MODULE_ID,
        self::COMMENT_ID,
        self::USER_ID,
        self::COMMENT,
        self::AUDIO
    ];

    public function user()
    {
        return $this->hasOne(User::Class,User::ID,self::USER_ID);
    }
}
