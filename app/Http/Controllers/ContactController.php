<?php

namespace App\Http\Controllers;

use App\Contact;
use Mail;
use Illuminate\Http\Request;
use App\Mail\ContactMail;
use App\Mail\ReserveMail;
use App\Mail\AdminContactMail;
use App\Mail\AdminReserveMail;
use App\Reserve;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index(Request $request){
        $data = $request->all();
        $next_day = 0;
        $toggle_contacts = "none";
        if (!isset($data['reserve_date'])) { // 予約日が指定されていなかったら
            $data['reserve_date'] = date('Y-m-d',strtotime('+1 day'));
            $next_day = date('Y-m-d',strtotime('+2 day'));
        }else{ //　予約日が指定されてたら
            $data['reserve_date'] = date("Y-").$data['reserve_month']."-".sprintf('%02d',$data['reserve_date']);
            $next_time = '+1 day '.$data['reserve_date'];
            $next_day = date('Y-m-d',strtotime($next_time));
            $toggle_contacts = 0;
        }
        //予約日 リスト
        $today = date("Y-m-d");
        $last_date = date("Y-m-t",strtotime("+1 month"));
        $reserve_data = Reserve::getDate($today,$last_date);
        $reserved_date = []; //既予約日
        $resevailble_date = []; //予約可能日
        $date_text = "";
        $key = 0;
        //予約されている日にち
        foreach ($reserve_data as $resedata) {
            $start_day = $resedata['start_day'];
            $end_day = $resedata['end_day'];
            $cal_date = (strtotime($end_day) - strtotime($start_day)) / (60 * 60 * 24);
            for ($s=0; $s <= $cal_date; $s++) { 
                $date_text = $start_day." +".$s." day";
                $date = date("Y-m-d",strtotime($date_text));
                if(strtotime($start_day) <= strtotime($date) && strtotime($date) <= strtotime($resedata['end_day'])){
                    $reserved_date[$key] = $date;
                }
                $key++;
            }  
        }
        //日付リスト
        for ($i=0; $i <= (strtotime($last_date) - strtotime($today)) / (60 * 60 * 24); $i++) { 
            $date_text = "+".$i." day";
            $target_date = date("Y-m-d",strtotime($date_text));
            $resevailble_date[$i] = $target_date;
        }
        //予約日と比較して予約されている日付は削除する
        foreach ($reserved_date as $key1 => $reseddate) { 
            foreach ($resevailble_date as $key2 => $resevdate) {
                if (strtotime($resevdate) == strtotime($reseddate)) {
                    // array_splice($resevailble_date, 1, 1,  null);
                    unset($resevailble_date[$key2]);                }
                if (strtotime($data['reserve_date']) == strtotime($reseddate)) {
                    $data['reserve_date'] = date("Y-m-d",strtotime($data['reserve_date'].' +1 day'));
                    $next_day = date("Y-m-d",strtotime($data['reserve_date'].' +1 day'));
                }
            }
        }
        array_splice($resevailble_date, 0, 1,  null); //当日予約は不可;
        return view('contact',compact('data','next_day','toggle_contacts','resevailble_date'));
    }

    public function confirm(Request $request){
        $data = $request->all();
        return view('confirm',compact('data'));
    }

    public function complete(Request $request){
        // フォームからのリクエストデータ全てを$contactに代入
        $contact = $request->all();

        if ($contact['contacts'] == 0) { //予約
            // DB::transaction(function () use ($contact)  {
                Mail::to($contact['email'])->send(new ReserveMail($contact));
                Mail::to(env('MAIL_USERNAME', 'syujiswe@gmail.com'))->send(new AdminReserveMail($contact));
                Reserve::reserve($contact);
            // });
        }else{ //　お問い合わせ
            Mail::to($contact['email'])->send(new ContactMail($contact));
            Mail::to(env('MAIL_USERNAME', 'syujiswe@gmail.com'))->send(new AdminContactMail($contact));
        }

        return view('complete',compact('contact'));
    }

    // public function confirm(Request $request){
    //     $contact = $request->all();
    // }
}
