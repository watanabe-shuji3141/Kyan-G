@extends('layouts.nav')
@section('nav-start')
<nav class="navbar navbar-expand-sm navbar-dark p-0  w-100" style="background-color:#1091D4;">
@endsection
@section('content')
<div class="container mt-5 py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card">
            <div class="card-header h5">{{ __('確認画面') }}</div>
            <div class="card-body">
                <form action="complete" method="POST" class="px-4">
                    @csrf
                    <input type="hidden" name="contacts" value="{{$data['contacts']}}">
                    <input type="hidden" name="name" value="{{$data['name']}}">
                    <input type="hidden" name="huri" value="{{$data['huri']}}">
                    <input type="hidden" name="tel" value="{{$data['tel']}}">
                    <input type="hidden" name="email" value="{{$data['email']}}">
                    <input type="hidden" name="pref31" value="{{$data['pref31']}}">
                    <input type="hidden" name="addr31" value="{{$data['addr31']}}">
                    <input type="hidden" name="start_day" value="{{$data['start_day']}}">
                    <input type="hidden" name="end_day" value="{{$data['end_day']}}">
                    <input type="hidden" name="ges-1" value="{{$data['ges-1']}}">
                    <input type="hidden" name="ges-2" value="{{$data['ges-2']}}">
                    <input type="hidden" name="contents" value="{{$data['contents']}}">
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">お名前</label>
                        <div class="col-md-8">
                            <label for="name" class="col-form-label text-md-right text-break w-100">{{$data['name']}}</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="huri" class="col-md-4 col-form-label text-md-right">フリガナ</label>
                        <div class="col-md-8">
                            <label for="huri" class="col-form-label text-md-right text-break w-100">{{$data['huri']}}</label>                        
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tel" class="col-md-4 col-form-label text-md-right">電話番号</label>
                        <div class="col-md-8">
                            <label for="tel" class="col-form-label text-md-right text-break w-100">{{$data['tel']}}</label>                        
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">Eメールアドレス</label>
                        <div class="col-md-8">
                            <label for="email" class="col-form-label text-md-right text-break w-100">{{$data['email']}}</label>                        
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="zip" class="col-md-4 col-form-label text-md-right">郵便番号</label>
                        <div class="col-md-8">
                            <label for="zip" class="col-form-label text-md-right text-break w-100">{{$data['zip31']}}-{{$data['zip32']}}</label>                        
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="addr31" class="col-md-4 col-form-label text-md-right">住所</label>
                        <div class="col-md-8">
                            <label for="addr31" class="col-form-label text-md-right text-break w-100">{{$data['pref31']}}{{$data['addr31']}}</label>                        
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="stay-day" class="col-md-4 col-form-label text-md-right">宿泊日</label>
                        <div class="col-md-8">
                            <label for="stay-day" class="col-form-label text-md-right text-break w-100">{{$data['start_day']}}〜{{$data['end_day']}}</label>                        
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="ges" class="col-md-4 col-form-label text-md-right">宿泊人数</label>
                        <div class="col-md-8">
                            <label for="ges" class="col-form-label text-md-right text-break w-100">大人{{$data['ges-1']}}人 子供{{$data['ges-2']}}人</label>                        
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="contents" class="col-md-4 col-form-label text-md-right">お問い合わせ内容</label>
                        <div class="col-md-8">
                            <label for="contents" class="col-form-label text-md-right text-break w-100">{{$data['contents']}}</label>
                        </div>
                    </div>
                    <div class="px-5 pt-5">
                        <button type="button" class="btn btn-primary float-left" onclick="history.back()">戻る</button>
                        <button type="submit" class="btn btn-primary float-right">送信</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
</div>

@endsection
@section('js')
    <script type="text/javascript" src="{{ asset('/assets/js/contact.js') }}"></script>
@endsection