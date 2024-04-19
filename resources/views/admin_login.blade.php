@extends('layouts.app')
@section('content')

<div class="container mt-5 py-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
            <div class="card">
                <div class="card-header h5">{{ __('管理者ログイン') }}</div>
                <div class="card-body pr-5">
                    <form action='admin.manage' method="POST" class="px-4">
                        @csrf
                        <div class="form-group row">
                            <label for="id" class="col-md-4 col-form-label text-md-right">ID</label>
                            <div class="col-md-8">
                                <input type="text" name="id" class="form-control" id="id" placeholder="ID">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">名前</label>
                            <div class="col-md-8">
                                <input type="text" name="name" class="form-control" id="name" placeholder="名前">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">パスワード</label>
                            <div class="col-md-8">
                                <input type="password" name="password" class="form-control" id="password" placeholder="パスワード">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary float-right">送信</button>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection

