<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    {{-- Meta Tags --}}
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    {{-- CSRF Token  --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>Login</title>

    {{-- Bootstrap --}}
    <link href="{{ asset('attachments/admin_assets/layout_assets/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    {{-- Font Awesome --}}
    <link href="{{ asset('attachments/admin_assets/layout_assets/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    {{-- NProgress --}}
    <link href="{{ asset('attachments/admin_assets/layout_assets/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    {{-- Animate.css --}}
    <link href="{{ asset('attachments/admin_assets/layout_assets/vendors/animate.css/animate.min.css') }}" rel="stylesheet">
    {{-- Custom Theme Style --}}
    <link href="{{ asset('attachments/admin_assets/layout_assets/build/css/custom.min.css') }}" rel="stylesheet">
  </head>
  <body class="login">
    <div>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <div class="login-form-error">
            @if(Session::has('error'))
              <div class="alert alert-danger fade in alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                <p>{{Session::get('error')}}</p>
              </div>
            @endif
          </div>
          <section class="login_content">
            {{ Form::open(array('route' => 'login','class' => 'admin-login-form')) }}
              <h1>Login Form</h1>
              <div>
                {{ Form::text('email',old("email"), array('class'=>'form-control','id'=>'email','placeholder'=>'Email','required'=>'required')) }}
                @if ($errors->has('email'))
                  <span>{{ $errors->first('email') }}</span>
                @endif
              </div>
              <div>
                {{ Form::password('password', array('class'=>'form-control','id'=>'password','placeholder'=>'password','required'=>'required')) }}
                @if ($errors->has('password'))
                  <span>{{ $errors->first('password') }}</span>
                @endif
              </div>
              <div class="text-center">
                {{ Form::submit('Log in', array('name'=>'admin_login','class'=>'btn btn-default submit','style'=>'float:none;margin:0px')) }}
              </div>

              <div class="clearfix"></div>

              <div class="separator">

                <div class="clearfix"></div>
                <br />
                <div>
                  <p>©<?php echo date('Y'); ?> All Rights Reserved. Privacy and Terms</p>
                </div>
              </div>
            {{ Form::close() }}
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
