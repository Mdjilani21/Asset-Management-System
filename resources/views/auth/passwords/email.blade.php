@extends('layouts.app', ['class' => 'reset-page', 'page' => 'Bengal Asset Management System', 'contentClass' => 'reset-page', 'section' => 'auth'])

@section('content')
    <div class="col-lg-4 col-md-6 ml-auto mr-auto">
        <form class="form" method="post" action="{{ route('password.email') }}">
            @csrf

            <div class="card card-login card-white">
                <div class="card-header">
                    <img src="assets/img/card-primary.png" alt="">
                    <h1 class="card-title">Reset My Password</h1>
                </div>
                <div class="card-body">
                    <div class="input-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-email-85"></i>
                            </div>
                        </div>
                        <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email">
                        @include('alerts.feedback', ['field' => 'email'])
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" href="" class="btn btn-primary btn-lg btn-block mb-3">Reset</button>
                </div>
            </div>
        </form>
    </div>
@endsection
