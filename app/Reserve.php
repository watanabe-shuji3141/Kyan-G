<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Reserve extends Model
{

    protected $table = 'reserve';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','huri','tel','email','addr','start_day','end_day','adult','child','num'
    ];

    // timestamps 使わない場合
    // public $timestamps = false;

    public static function reserve($data){

        $reserve = new Reserve();
        $reserve -> create([
            'name' => $data['name'],
            'huri' => $data['huri'],
            'tel' => $data['tel'],
            'email' => $data['email'],
            'addr' => $data['addr31'],
            'start_day' => $data['start_day'],
            'end_day' => $data['end_day'],
            'adult' => $data['ges-1'],
            'child' => $data['ges-2'],
            'num' => 1,
        ]);
    }


    // 日付を指定し、データを取得(createdで検索)
    public static function getCreatedDay($from,$until){

        $date = Reserve::whereBetween("created_at", [$from, $until])->get();

        return $date;
    }

    // 日付を指定し、データを取得(start,end dayで検索)
    public static function getDate($from,$until){

        $date = Reserve::select("start_day","end_day","num")
                            ->where("end_day","<=",$until)
                            ->where("start_day",">=",$from)
                            ->get();

        return $date;
    }

    public static function getData(){

        $data = Reserve::orderBy('start_day', 'desc')->get();
        return $data;
    }

    public static function cancel($id){
        Reserve::where('id','=',$id)
                    ->update([
                        'num' => '0'
                    ]);
    }

    public static function tempUpdate($id){
        Reserve::where('id','=',$id)
                    ->update([
                        'num' => '1'
                    ]);
    }

    public static function realUpdate($id){
        Reserve::where('id','=',$id)
                    ->update([
                        'num' => '2'
                    ]);
    }
}
