@extends('layouts.nav')
@section('nav-start')
<nav class="navbar navbar-expand-sm navbar-dark p-0  w-100" style="background-color:#1091D4;">
@endsection
@section('content')
<div class="container mt-5 py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header h5">{{ __('送信完了') }}</div>
                <div class="card-body">
                    @if ($contact['contacts'] == 0)
                        <p>ご予約ありがとうございました。</p><br>
                        <p>入力いただいたメールアドレスにてご予約内容をお送りしております。</p><br>
                        <p>入力の間違いや気になること等ございましたらこちらの番号（<a href="tel:+ 81-90-9589-1314">090-9589-1314</a>）</p><br>
                        <p>もしくは本サイトの「ご予約・お問い合わせ」よりお問合せください。</p><br>
                    @else
                        <p>お問合せありがとうございました。</p><br>
                        <p>数日以内に問い合わせに対しての返信がございます。</p><br>
                        <p>しばらくお待ちください。</p><br><br>
                    @endif
                </div>
                <div class="text-center my-4">
                    <a href="{{ url('/') }}" class="btn-primary btn">ホームに戻る</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('js')
    <script type="text/javascript" src="{{ asset('/assets/js/contact.js') }}"></script>
@endsection