<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    const TABLE     =   'modules';
    const ID        =   'id';
    const DATE      =   'date';
    const TITLE     =   'title';
    const STATUS    =   'status';
    const ACTIVE    =   'active';
    const INACTIVE  =   'inactive';

    protected $fillable =   [
        self::TITLE,
        self::DATE,
        self::STATUS,
    ];

    public function comments() {
        return $this->hasMany(Comments::class,Comments::MODULE_ID,self::ID);
    }
}
