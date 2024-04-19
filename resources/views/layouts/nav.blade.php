@extends('layouts.app')
<div class="nav position-relative">
        @yield('nav-start')
            <!-- ナビゲーションバー（タイトル） -->
            <a class="navbar-brand px-4 py-3 mr-5 text-white" href="{{ url('/') }}"><span class="h3">Kyan-G</span></a>
            <!-- ハンバーガー -->
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#Navber" aria-controls="Navber" aria-expanded="false" aria-label="ナビゲーションの切替">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- ナビゲーションバー（サブ） -->
            <div class="collapse navbar-collapse" id="Navber">
                <ul class="navbar-nav w-100 row">
                    <li class="nav-item active col-sm-3 text-sm-center mx-0 my-auto h5 p-0">
                        <span class="nav-link">
                            <a href="#" class="nav-text facility-btn text-white text-decoration-none d-block py-3 pl-4 px-md-0">部屋・設備</a>
                        </span>
                    </li>
                    <li class="nav-item active col-sm-3 text-sm-center mx-0 my-auto h5 p-0">
                        <span class="nav-link">
                            <a href="#" class="nav-text charge-btn text-white text-decoration-none d-block py-3 pl-4 px-md-0">宿泊料金</a>
                        </span>
                    </li>
                    <li class="nav-item active col-sm-3 text-sm-center mx-0 my-auto h5 p-0">
                        <span class="nav-link">
                            <a href="#" class="nav-text reserve-btn text-white text-decoration-none d-block py-3 pl-4 px-md-0">予約状況</a>
                        </span>
                    </li>
                    <li class="nav-item active col-sm-3 text-sm-center mx-0 my-auto h5 p-0">
                        <span class="nav-link">
                            <a href="{{ url('/contact') }}" class="nav-text text-white text-decoration-none d-block py-1 pl-4 px-md-0">ご予約 <br> お問い合わせ</a>
                        </span>
                    </li>
                </ul>
            </div>
        </nav>
    </div>