<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use App\Reserve;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(Request $request){
        $success = $request->session()->get('success');
        return view('admin_login')->with('success',$success);
    }

    public function confirm(Request $request){
        $data = $request->all();
        $admin_data = Admin::getData($data['id'],$data['name']);
        if(isset($admin_data[0]->password) && $data['password'] == $admin_data[0]->password){
        // if(isset($admin_data[0]->password) && Hash::check($data['password'],$admin_data[0]->password)){
            // return view('admin_manage',compact("reserve_data"))->with('status', 'Login successful.');
            // $this->viewList();
            
            // ミドルウェア用
            $request->session()->put("admin_auth", true);
            $reserve_data = Reserve::getData();
            $today = date("Y-m-d");
            foreach ($reserve_data as $data) {
                if (strtotime($data['end_day']) < strtotime($today)) {
                    $data['num'] = 3;
                }
            }
            return view('admin_manage')->with('reserve_data',$reserve_data,);
        }else{
            return back()->withErrors('ログインに失敗しました。');
        }
    }

    public function viewList(Request $request){
        $success = $request->session()->get('success');
        $reserve_data = Reserve::getData();
        // return route('admin.manage',['reserve_data'=>$reserve_data]);
        $today = date("Y-m-d");
        foreach ($reserve_data as $data) {
            if (strtotime($data['end_day']) < strtotime($today)) {
                $data['num'] = 3;
            }
        }
        // return redirect()->route('admin.confirm');
        return view('admin_manage')->with(['reserve_data' => $reserve_data,'success' => $success]);
    }

    public function realUpdate(Request $request){
        Reserve::realUpdate($request->id);
        return redirect('admin.manage')->with('success', '本予約に変更しました');   
    }

    public function cancel(Request $request){
        Reserve::cancel($request->id);
        return redirect('admin.manage')->with('success', '予約を取り消しました'); 
    }

    public function tempUpdate(Request $request){
        Reserve::tempUpdate($request->id);
        return redirect('admin.manage')->with('success', '仮予約に変更しました');   
    }

    public function logout(Request $request){
        $request->session()->forget("admin_auth");
        return redirect()->route("admin.login")->with('success', "ログアウトしました。");
    }

}
