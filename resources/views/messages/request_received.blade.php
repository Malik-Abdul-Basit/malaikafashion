<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" class="no-js no-svg">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    {{-- CSRF Token  --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ ucwords(str_replace('_', ' ', $title)) }}</title>
    
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset('attachments/admin_assets/layout_assets/vendors/bootstrap/dist/css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset('attachments/admin_assets/layout_assets/vendors/font-awesome/css/font-awesome.css') }}"/>
    
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset('attachments/public_assets/layout_assets/themes/woochi/assets/css/inner_style2.css') }}"/>
  </head>
  <body class="message-page-body">
    <div class="message-page-wrapper">
      <div class="row">
        <div class="col-md-12">
          <p class="icon-line">
            <span class="icon-outer">
          	  <i class="fa fa-check"></i>
            </span>
          </p>
          <h4 class="d-message">Your Request Successfully Received.</h4>
          <hr style="float:left;width:100%;">
          <h3 class="message-heading"> Detail Below </h3>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 table-outter">
          
          <div class="row">
           	<div class="col-md-2 col-sm-3 col-xs-5">
           	  <b>Name</b>
           	</div>
           	<div class="col-md-10 col-sm-9 col-xs-7">
           	  {{ $data['name'] }}
           	</div>
          </div>

            <div class="row">
                <div class="col-md-2 col-sm-3 col-xs-5">
                    <b>Email</b>
                </div>
                <div class="col-md-10 col-sm-9 col-xs-7">
                    {{ $data['email'] }}
                </div>
            </div>
          
          <div class="row">
           	<div class="col-md-2 col-sm-3 col-xs-5">
           	  <b>Phone #</b>
           	</div>
           	<div class="col-md-10 col-sm-9 col-xs-7">
           	  {{ $data['phone'] }}
           	</div>
          </div>
          
          <div class="row">
           	<div class="col-md-2 col-sm-3 col-xs-5">
           	  <b>Message</b>
           	</div>
           	<div class="col-md-10 col-sm-9 col-xs-7">
           	  {{ $data['message'] }}
           	</div>
          </div>
           
          <hr style="float:left;width:100%;">
           
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <small>
            Thank you for submission.
          </small>
        </div>
      </div>
    </div>
    <div class="message-page-back-btn-row">
      <a href="{{ route('HOME') }}">
        <i class="fa fa-home icon-flipped" aria-hidden="true"></i>
        <span style="display:inline-block;float:left;margin:6px 0px 0 6px;">Go Home</span>
      </a>
    </div>
    
    <script language="javascript" type="text/javascript" src="{{ asset('attachments/admin_assets/layout_assets/vendors/jquery/dist/jquery.min.js') }}" data-minify="1" defer></script>
    
    <script language="javascript" type="text/javascript" src="{{ asset('attachments/admin_assets/layout_assets/vendors/bootstrap/dist/js/bootstrap.min.js') }}" data-minify="1" defer></script>
  </body>
</html>
