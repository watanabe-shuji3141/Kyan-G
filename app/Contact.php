<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contacts';

    protected $fillable = [
        'hurigana', 'name', 'email', 'gender', 'body'
    ];
    static $genders = [
        '男', '女'
    ];


    public static function test(){
        $items = \DB::table('contacts')->get();
        return $items;
    }

}