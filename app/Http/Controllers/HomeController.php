<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reserve;


class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        date_default_timezone_set('Asia/Tokyo');
        function makecal($month){
            $year = date('Y');
            //月末日を取得
            $end_month = date('t', strtotime($year.$month.'01'));
            //1日の曜日を取得
            $first_week = date('w', strtotime($year.$month.'01'));
            //月末日の曜日を取得
            // $last_week = date('w', strtotime($year.$month.$end_month));
            $ary_calendar = [];
            $j = 0;
            // 先月から来月までのデータを取得
            $num1 = $month - date('m') -1;
            $num2 = $num1 + 2;
            $num3 = $num1 + 1;
            $first_date = date("Y/m/01",strtotime($num1." month"));
            $last_date = date("Y/m/t",strtotime($num2." month"));
            $reserve_data = Reserve::getDate($first_date,$last_date);
            $thmo_first_day = date("Y/m/01",strtotime($num3." month")); //当月の最初
            $thmo_last_day = date("Y/m/t",strtotime($num3." month")); //当月の最後
            $num1array = []; //仮予約
            $num2array = []; //本予約
            // 3回繰り返す
            foreach ($reserve_data as $data) {
                // 先月開始の今月終わり
                if (strtotime($thmo_first_day) <= strtotime($data->end_day) && date('m',strtotime($num1.' month')) == date('m',strtotime($data->start_day))) {
                    for ($s=1; $s <= date('d',strtotime($data->end_day)); $s++) { 
                        if ($data->num == 1) {
                            $num1array[] = $s;
                        }elseif($data->num == 2){
                            $num2array[] = $s;
                        }
                    }
                }
                // 今月開始の今月終わり
                if (strtotime($thmo_first_day) <= strtotime($data->start_day) && strtotime($data->end_day) <= strtotime($thmo_last_day)) {
                    for ($s=idate('d',strtotime($data->start_day)); $s <= idate('d',strtotime($data->end_day)); $s++) { 
                        if ($data->num == 1) {
                            $num1array[] = $s;
                        }elseif($data->num == 2){
                            $num2array[] = $s;
                        }
                    }
                }
                // 今月開始の来月終わり
                if (strtotime($thmo_last_day) >= strtotime($data->start_day) && date('m',strtotime($num2.' month')) == date('m',strtotime($data->end_day))) {
                    for ($s=idate('d',strtotime($data->start_day)); $s <= date('d',strtotime($thmo_last_day)); $s++) { 
                        if ($data->num == 1) {
                            $num1array[] = $s;
                        }elseif($data->num == 2){
                            $num2array[] = $s;
                        }
                    }
                }
            }

            //1日開始曜日までの穴埋め
            for($i = 0; $i < $first_week; $i++){
                $ary_calendar[$j][] = '<td></td>';
            }

            //1日から月末日までループ 31回繰り返す
            for ($i = 1; $i <= $end_month; $i++){
                //日曜日まで進んだら改行
                if(isset($ary_calendar[$j]) && count($ary_calendar[$j]) === 7){
                    $j++;
                }
                if($i < date('d') && $month == date('m')){
                    $ary_calendar[$j][] = '<td class="alert-light p-0 align-middle"><input type="button" value="'.$i.'" class="btn d-block w-100" disabled></td>';
                }elseif($i == date('d') && $month == date('m')){
                    $ary_calendar[$j][] = '<td class="alert-warning p-0 align-middle"><input type="button" value="'.$i.'" class="btn d-block w-100" disabled></td>';
                }elseif (in_array($i,$num1array)) {
                    $ary_calendar[$j][] = '<td class="alert-info p-0 align-middle"><input type="button" value="'.$i.'" class="btn text-info d-block w-100" disabled></td>';
                }elseif(in_array($i,$num2array)){
                    $ary_calendar[$j][] = '<td class="alert-dark p-0 align-middle"><input type="button" value="'.$i.'" class="btn text-dark d-block w-100" disabled></td>';
                }else{
                    $ary_calendar[$j][] = '<td class="alert-success p-0 align-middle"><input type="submit" data-month="'.$month.'" name="reserve_date" value="'.$i.'" class="btn text-success d-block w-100"></td>';
                }
            }
            //月末曜日の穴埋め
            for($i = count($ary_calendar[$j]); $i < 7; $i++){
                $ary_calendar[$j][] = '<td></td>';
            }
            return $ary_calendar;
        }

        //表示させる年月を設定　↓これは現在の月
        $month1 = date('m');
        $ary_calendar1 = makecal($month1);
        $month2 = date('m',strtotime('+1 month'));
        $ary_calendar2 = makecal($month2);

        $ary_week = ['日', '月', '火', '水', '木', '金', '土'];
        $month1 = date('n');
        $month2 = date('n',strtotime('+1 month'));

        return view('home',compact('month1','month2','ary_week','ary_calendar1','ary_calendar2'));
    }
}
