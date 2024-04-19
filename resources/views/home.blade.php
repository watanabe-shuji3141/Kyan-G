@extends('layouts.nav')
@section('nav-start')
<nav class="navbar navbar-expand-sm navbar-dark w-100 p-0">
@endsection
@section('content')
    <header>
    </header>
    <div class="position-relative">
        
        <ul class="slider">
            <li><img src="{{ asset('/assets/images/pensyon_sample1.jpg') }}" alt="image01" class="slick-img img-fluid w-100"></li>
            <li><img src="{{ asset('/assets/images/okinawa_beach.jpg') }}" alt="image02" class="slick-img img-fluid w-100"></li>
            <li><img src="{{ asset('/assets/images/pensyon_sample3.jpg') }}" alt="image03" class="slick-img img-fluid w-100"></li>
            <!-- <li><img src="{{ asset('/assets/images/pensyon_sample8.jpg') }}" alt="image08" class="slick-img img-fluid w-100"></li> -->
        </ul>
        
        <div class="img-text text-white">
            <p class="">自然に囲まれた癒しの空間</p>
        </div>
    </div>
    {{-- 背景画像 --}}
    <div class="back-img">
        <img src="{{ asset('/assets/images/27067428_m.jpg') }}" class="position-fixed" alt="">
    </div>
    <div class="contents-wrapper bg-white mx-auto">
        <div class="facility my-5 mx-5 text-center">
            <label class="title pt-1 mb-5 h1" for="">施設・周辺情報</label>
            <div class="">
                <div class="row mb-5 pb-5">
                    <div class="col-12 col-md-6 pb-4 pb-md-0">
                        <img src="{{ asset('/assets/images/sample1.jpg') }}" alt="" class="img-fluid">
                    </div>
                    <div class="col-12 col-md-6">
                        <p class="h5 mt-3">部屋</p>
                        <p class="mt-5">
                            テキストが入りますテキストが入ります
                            <br>
                            テキストが入りますテキストが入ります
                        </p>                        {{-- <div class="row">
                            <div class="col-7 h5 text-left">
                                <p>・シングルベッド &times; 1</p>
                                <p>・ソファー</p>
                                <p>・ケトル</p>
                                <p>・洗濯機</p>
                                <p>・エアコン</p>
                                <p>・ドライヤー</p>
                                <p>・テレビ</p>
                            </div>
                            <div class="col-5 h5 text-left">
                                <p>・歯ブラシ</p>
                                <p>・マウスウォッシュ</p>
                                <p>・スリッパ</p>
                                <p>・タオル</p>
                                <p>・シャンプー</p>
                                <p>・コンディショナー</p>
                                <p>・ボディソープ</p>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="row mb-5 pb-5">
                    <div class="col-12 col-md-6 order-2 order-md-1">
                        <p class="h5 mt-3">プール</p>
                        <p class="mt-5">
                            テキストが入りますテキストが入ります
                            <br>
                            テキストが入りますテキストが入ります
                        </p>
                    </div>
                    <div class="col-12 col-md-6 order-1 order-md-2 pb-4 pb-md-0">
                        <img src="{{ asset('/assets/images/sample3.jpg') }}" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="row mb-5 pb-5">
                    <div class="col-12 col-md-6 pb-4 pb-md-0">
                        <img src="{{ asset('/assets/images/sample5.jpg') }}" alt="" class="img-fluid">
                    </div>
                    <div class="col-12 col-md-6">
                        {{-- <p class="h3">周辺情報</p> --}}
                        {{-- <div class="d-flex align-items-center justify-content-center h-200"> --}}
                        <p class="h5 mt-3">周辺情報</p>
                        <p class="mt-5">
                            テキストが入りますテキストが入ります
                            <br>
                            テキストが入りますテキストが入ります
                        </p>
                        {{-- </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="charge my-5">
            <label class="title pt-1 h1" for="">宿泊料金</label>
            <br>
            <br>
            <div class="row justify-content-center mx-3">
                <div class="card border-info col-5 col-md-2" style="border-radius: 50px;">
                    <div class="card-body px-0">
                        <h5 class="card-title">基本料金</h5>
                        <p class="card-text h5">12000円</p>
                    </div>
                </div>
                <div class="col-2 pt-1 mt-4 h3">
                    +
                </div>
                <div class="card border-info col-5 col-md-2" style="border-radius: 50px;">
                    <div class="card-body px-0">
                        <h5 class="card-title mt-3 mt-sm-0">下記料金</h5>
                        <p class="card-text">&times;人数分</p>
                    </div>
                </div>
            </div>

            <br>
            <br>
            <br>
            <div class="mx-md-5">
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap bg-white">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>ご宿泊対象</th>
                                <th>通常料金</th>
                                <th>ハイシーズン料金</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>高校生以上</td>
                                <td>2000円</td>
                                <td>2500円</td>
                            </tr>
                            <tr>
                                <td>小学生以上</td>
                                <td>1500円</td>
                                <td>2000円</td>
                            </tr>
                            <tr>
                                <td>小学生未満(寝具あり)</td>
                                <td>500円</td>
                                <td>750円</td>
                            </tr>
                            <tr>
                                <td>小学生未満(寝具なし)</td>
                                <td>無料</td>
                                <td>無料</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{-- <div class="contents2">
            <span class="title pt-1 h3">レンタカー</span>
            
        </div> --}}
        <div class="reserve mx-sm-5 my-5">
            <form action="contact" method="GET" class="">
                <input type="hidden" name="reserve_month" value="">
                <span class="title pt-1 h1">予約状況</span>
                <p class="text-sm-left my-4">
                予約可<span class="alert-success px-2 mx-1 mr-3"></span>
                仮予約済み<span class="alert-info px-2 mx-1 mr-3"></span>
                予約済み<span class="alert-dark px-2 mx-1 mr-3"></span>
                今日<span class="alert-warning px-2 mx-1 mr-3"></span>
                </p>
                <div id="carouselExampleControls" class="carousel slide mb-5" data-ride="carousel" data-interval="false">
                    <!-- スライドさせる画像の設定 -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="table-responsive mt-2 pb-5">
                                <table class="table table-bordered text-nowrap text-center">
                                    <thead class="bg-dark text-white">
                                        <tr>
                                            <th colspan="7">{{$month1}}月</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <tr>
                                                @foreach ($ary_week as $key => $week)
                                                    @if ($key == 0)
                                                        <td class="text-danger">{{$week}}</td>
                                                    @elseif($key == 6)
                                                        <td class="text-primary">{{$week}}</td>
                                                    @else
                                                        <td>{{$week}}</td>
                                                    @endif
                                                @endforeach
                                            </tr>
                                            @foreach ($ary_calendar1 as $ary_num)
                                                <tr>
                                                    @foreach ($ary_num as $day)
                                                    {!!$day!!}
                                                    @endforeach
                                                </tr>
                                            @endforeach
                                    </tbody>
                                    
                                </table>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="table-responsive mt-2">
                                <table class="table table-bordered text-nowrap text-center">
                                    <thead class="bg-dark text-white">
                                        <tr>
                                            <th colspan="7">{{$month2}}月</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <tr>
                                                @foreach ($ary_week as $key => $week)
                                                    @if ($key == 0)
                                                        <td class="text-danger">{{$week}}</td>
                                                    @elseif($key == 6)
                                                        <td class="text-primary">{{$week}}</td>
                                                    @else
                                                        <td>{{$week}}</td>
                                                    @endif
                                                @endforeach
                                            </tr>
                                            @foreach ($ary_calendar2 as $ary_num)
                                                <tr>
                                                    @foreach ($ary_num as $day)
                                                    {!!$day!!}
                                                    @endforeach
                                                </tr>
                                            @endforeach
                                    </tbody>
                                    
                                </table>
                            </div>
                        </div>
                    </div><!-- /.carousel-inner -->
                    <!-- スライドコントロールの設定 -->
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">前へ</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">次へ</span>
                    </a>
                </div><!-- /.carousel -->

                <a href="{{ url('/contact') }}" class="h5 mt-3 mx-0 mx-sm-3 text-primary" >ご予約・お問い合わせはこちら</a>
                {{-- <p class="h5 mt-3 text-primary">ご予約・お問い合わせはこちらから</p> --}}
                <a href="{{ url('/contact') }}" class="text-white text-decoration-none mr-3"><p class="btn-primary btn my-4"><i class="fas fa-envelope-square mr-1"></i>問い合わせフォーム</p></a>
                <a href="tel:080-6481-6479" class="text-white text-decoration-none"><p class="btn-primary btn my-4"><i class="fas fa-phone mr-2"></i>お電話</p></a>
            </form>
        </div>
    </div>
    <footer class="footer text-white">
        <div class="row">
            <div class="col-sm-9"></div>
            <div class="col-sm-3 col-12">
                <p class="text-sm-left text-center small mt-2"> 〒999-0000 住所が入ります </p>
                <p class="text-sm-left text-center small mt-1"> 電話番号 000-0000-0000</p>
            </div>
            <div class="col">
                <p class="text-sm-center text-right small mt-2">Kyn-G テスト会社</p>
            </div>
        </div>
    </footer>
@endsection