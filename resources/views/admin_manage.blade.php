@extends('layouts.app')
@section('content')
<form action="" method="POST">
    @csrf
    <div class="row my-3">
        <div class="col-md-2 col-4 ml-2">
            <span>本予約：</span>
            <button class="btn btn-success d-inline" disabled="disabled"></button>
        </div>
        <div class="col-md-2 col-4 ml-2">
            <span>取消済み：</span>
            <button class="btn btn-danger d-inline" disabled="disabled"></button>
        </div>
        <div class="col-md-2 col-4 ml-2">
            <span>仮予約：</span>
            <button class="btn btn-info d-inline" disabled="disabled"></button>
        </div>
        <div class="col-md-2 col-4 ml-2">
            <span>宿泊済み：</span>
            <button class="btn btn-secondary d-inline" disabled="disabled"></button>
        </div>
    </div>
    <div class="mx-2">
        <div class="table-responsive mt-2">
            <table class="table table-bordered text-nowrap">
                {{-- <thead class="bg-dark text-white">
                    <tr>
                        <th colspan="7">{{$month}}月</th>
                    </tr>
                </thead> --}}
                <tbody>
                    <tr>
                        <td>名前</td>
                        <td>電話番号</td>
                        <td>メールアドレス</td>
                        <td>住所</td>
                        <td>宿泊開始日</td>
                        <td>宿泊終了日</td>
                        <td>大人</td>
                        <td>子供</td>
                        <td colspan="3">操作ボタン</td>
                    </tr>
                    @foreach ($reserve_data as $data)
                    <tr class="num{{$data['num']}}">
                        <td class="d-none" data-end-day="{{$data['end_day']}}"></td>
                        <td>{{$data['name']}} <br> ({{$data['huri']}})</td>
                        <td>{{$data['tel']}}</td>
                        <td>{{$data['email']}}</td>
                        <td>{{$data['addr']}}</td>
                        <td>{{$data['start_day']}}</td>
                        <td>{{$data['end_day']}}</td>
                        <td>{{$data['adult']}}人</td>
                        <td>{{$data['child']}}人</td>
                        <td><button type="submit" formaction="admin.realUpdate" class="btn btn-success" name="id" value="{{$data['id']}}">本予約</button></td>
                        <td><button type="submit" formaction="admin.cancel" class="btn btn-danger" name="id" value="{{$data['id']}}">取消</button></td>
                        <td><button type="submit" formaction="admin.tempUpdate" class="btn btn-info" name="id" value="{{$data['id']}}">仮予約</button></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</form>
<div class="logout text-right mr-2">
    <a href="{{ route('admin.logout') }}"><button class="btn btn-secondary">ログアウト</button></a>
</div>
@endsection
