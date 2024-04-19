@extends('layouts.nav')
@section('nav-start')
<nav class="navbar navbar-expand-sm navbar-dark p-0  w-100" style="background-color:#1091D4;">
@endsection
@section('content')
<div class="container mt-5 py-5">
    <div class="row justify-content-center">
        <div class="col-md-11">
        <div class="card">
            <div class="card-header h5">{{ __('ご予約・お問い合わせ') }}</div>
            <div class="card-body pr-5">
                <form action="confirm" method="POST" class="px-4">
                    @csrf
                    <div class="form-group row">
                        <label for="contacts" class="col-md-4 col-form-label text-md-right">内容</label>
                        <div class="col-md-8">
                            <select class="form-control" name="contacts" id="contacts" required>
                                @if ($toggle_contacts == '0')
                                    <option disabled value="">選択してください</option>
                                    <option selected value="0">宿泊予約</option>
                                    <option value="1">お問い合わせ</option>
                                @else
                                    <option disabled selected value="">選択してください</option>
                                    <option value="0">宿泊予約</option>
                                    <option value="1">お問い合わせ</option>   
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">お名前</label>
                        <div class="col-md-8">
                            <input type="text" name="name" class="form-control" id="name" placeholder="お名前" value="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="huri" class="col-md-4 col-form-label text-md-right">フリガナ</label>
                        <div class="col-md-8">
                            <input type="text" name="huri" class="form-control" id="huri" placeholder="フリガナ" value="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tel" class="col-md-4 col-form-label text-md-right">電話番号</label>
                        <div class="col-md-8">
                            <input type="tel" name="tel" class="form-control" id="tel" placeholder="電話番号">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">Eメールアドレス</label>
                        <div class="col-md-8">
                            <input type="email" name="email" class="form-control" id="email" placeholder="Eメールアドレス" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="zip" class="col-md-4 col-form-label text-md-right">郵便番号</label>
                        <div class="col-md-8 zip">
                            <div class="row">
                                <div class="col-sm-3 col-4 pr-0">
                                    <input type="tel" name="zip31" size="4" maxlength="3" class="form-control">
                                </div>
                                <div class="col-1 p-0 my-auto text-center">
                                    <span>－</span>
                                </div>
                                <div class="col-sm-5 col-6 pl-0">
                                    <input type="tel" name="zip32" size="5" maxlength="4" class="form-control" onKeyUp="AjaxZip3.zip2addr('zip31','zip32','pref31','addr31','addr31');">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pref31" class="col-md-4 col-form-label text-md-right">都道府県</label>
                        <div class="col-md-8">
                            <input type="text" name="pref31" size="20" class="form-control" placeholder="都道府県">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="addr31" class="col-md-4 col-form-label text-md-right">都道府県以降の住所</label>
                        <div class="col-md-8">
                            <input type="text" name="addr31" size="40" class="form-control" placeholder="都道府県以降の住所" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="stay-day" class="col-md-4 col-form-label text-md-right">宿泊予定日</label>
                        {{-- マックス予定日を再来月までにする主にjsで --}}
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-sm-5 col-10">
                                    <select name="start_day" class="form-control stay-day" id="start_day" data-toggle="tooltip" data-placement="top" data-trigger="hover" title="{{$data['reserve_date']}}">
                                        @foreach ($resevailble_date as $date)
                                            @if ($date == $data['reserve_date'])
                                                <option value={{$date}} selected>{{$date}}</option>
                                            @else
                                                <option value={{$date}}>{{$date}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-1 p-0 my-auto text-center">
                                    <span>〜</span>
                                </div>
                                <div class="col-sm-5 col-10 mt-sm-0 mt-3">
                                    <select name="end_day" class="form-control stay-day" id="end_day" data-toggle="tooltip" data-placement="top" data-trigger="hover" title="{{$next_day}}">
                                        @foreach ($resevailble_date as $date)
                                            @if ($date == $next_day)
                                                <option value={{$date}} selected>{{$date}}</option>
                                            @else
                                                <option value={{$date}}>{{$date}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="ges" class="col-md-4 col-form-label text-md-right">宿泊人数</label>
                            <div class="col-md-8 ges">
                                <div class="row">
                                    <div class="col-2 p-0 my-auto ml-sm-0 ml-2 text-center">
                                        <span>大人</span>
                                    </div>
                                    <div class="col-sm-3 col-8">
                                        <input type="number" name="ges-1" class="form-control" id="ges-1" min='1' value="1">
                                    </div>
                                    <div class="col-1 p-0 my-auto text-center">
                                        <span>人</span>
                                    </div>
                                    <div class="col-2 p-0 my-auto ml-sm-0 ml-2 text-center">
                                        <span>子供</span>
                                    </div>
                                    <div class="col-sm-3 col-8 mt-sm-0 mt-3">
                                        <input type="number" name="ges-2" class="form-control" id="ges-2" min='0' value="0">
                                    </div>
                                    <div class="col-1 p-0 my-auto text-center">
                                        <span>人</span>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="form-group row">
                        <label for="contents" class="contents col-md-4 col-form-label text-md-right">お問い合わせ内容</label>
                        <div class="col-md-8">
                            <textarea name="contents" class="form-control" id="contents" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="text-right">
                        <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="">
                            <button type="submit" class="btn btn-primary float-right">確認画面へ</button>
                        </span>
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