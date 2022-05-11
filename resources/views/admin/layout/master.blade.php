<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>

    {{-- Meta Tags --}}
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    {{-- CSRF Token  --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Panel</title>

	{{-- Bootstrap --}}
    <link href="{{ asset('attachments/admin_assets/layout_assets/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    {{-- Font Awesome --}}
    <link href="{{ asset('attachments/admin_assets/layout_assets/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    {{-- NProgress --}}
    <link href="{{ asset('attachments/admin_assets/layout_assets/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <link href="{{ asset('attachments/admin_assets/fileupload_assets/css/bootstrap-fileupload.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('attachments/admin_assets/fileupload_assets/css/main.css') }}" rel="stylesheet" />
    @if($PageType=='view')
      {{-- iCheck --}}
      <link href="{{ asset('attachments/admin_assets/layout_assets/vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">
      {{-- Datatables --}}
      <link href="{{ asset('attachments/admin_assets/layout_assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
      <link href="{{ asset('attachments/admin_assets/layout_assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
      <link href="{{ asset('attachments/admin_assets/layout_assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
      <link href="{{ asset('attachments/admin_assets/layout_assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
      <link href="{{ asset('attachments/admin_assets/layout_assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">
    @endif
    
    @stack('additional_header_files')

    {{-- Custom Theme Style --}}
    <link href="{{ asset('attachments/admin_assets/layout_assets/build/css/custom.min.css') }}" rel="stylesheet">
  </head>

  <body class="nav-md">
    <?php
      $admin_id = Session::get('logedin_admin_id');
      $admin_info = DB::table('users')->where('id',$admin_id)->first();
    ?>
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border:0;">
              <a href="{{route('dashboard')}}" class="site_title"><i class="fa fa-paw"></i> <span>Admin Panel</span></a>
            </div>

            <div class="clearfix"></div>

            {{-- start menu profile quick info --}}
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="{{ asset('attachments/admin_assets/layout_assets/images/img.png') }}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{$admin_info->first_name}} {{$admin_info->last_name}}</h2>
              </div>
            </div>
            {{-- end menu profile quick info --}}

            <br />

            {{-- start sidebar menu --}}
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  {{-- Dashboard --}}
                  <li @if($page=='dashboard')class="current-page"@endif>
                    <a href="{{ route('dashboard') }}">
                      <i class="fa fa-home"></i> Dashboard
                    </a>
                  </li>
                  
                  {{-- Manage Logo --}}
                  <li @if($page=='all_logos' or $page=='add_logo_form')class="active"@endif>
                    <a><i class="fa fa-file"></i> Manage Logo <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" @if($page=='all_logos' or $page=='add_logo_form')style="display:block"@endif>
                      <li @if($page=='all_logos')class="current-page"@endif>
                        <a href="{{ route('logos') }}"> All Logos </a>
                      </li>
                      <li @if($page=='add_logo_form')class="current-page"@endif>
                        <a href="{{ route('add_logo') }}">Add </a>
                      </li>
                    </ul>
                  </li>
                  
                  {{-- Manage categories --}}
                  <li @if($page=='all_categories' or $page=='category_form')class="active"@endif>
                    <a><i class="fa fa-bars"></i> Manage Categories <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" @if($page=='all_categories' or $page=='category_form')style="display:block"@endif>
                      <li @if($page=='all_categories')class="current-page"@endif>
                        <a href="{{ route('categories') }}">All Categories</a>
                      </li>
                      <li @if($page=='category_form')class="current-page"@endif>
                        <a href="{{ route('add_category') }}">Add</a>
                      </li>
                    </ul>
                  </li>
                  
                  {{-- Manage Products --}}
                  <li @if($page=='all_products' or $page=='product_form')class="active"@endif>
                    <a><i class="fa fa-sort-alpha-asc"></i> Manage Products <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" @if($page=='all_products' or $page=='product_form')style="display:block"@endif>
                      <li @if($page=='all_products')class="current-page"@endif>
                        <a href="{{ route('products') }}">All Products</a>
                      </li>
                      <li @if($page=='product_form')class="current-page"@endif>
                        <a href="{{ route('add_product') }}">Add</a>
                      </li>
                    </ul>
                  </li>
                  
                  {{-- Manage Product Images --}}
                  <li @if($page=='all_product_images' or $page=='product_images_form')class="active"@endif>
                    <a><i class="fa fa-image"></i> Product Images <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" @if($page=='all_product_images' or $page=='product_images_form')style="display:block"@endif>
                      <li @if($page=='all_product_images')class="current-page"@endif>
                        <a href="{{ route('product_images') }}">All Product Images</a>
                      </li>
                      <li @if($page=='product_images_form')class="current-page"@endif>
                        <a href="{{ route('add_product_image') }}">Add</a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            {{-- end sidebar menu --}}

            {{-- start menu footer buttons --}}
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ route('logout') }}">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            {{-- end menu footer buttons --}}
          </div>
        </div>

        {{-- start top navigation --}}
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="{{ asset('attachments/admin_assets/layout_assets/images/img.png') }}" alt="">
                    {{$admin_info->first_name}} {{$admin_info->last_name}}
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>
                    <li><a href="{{ route('logout') }}"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        {{-- end top navigation --}}

        @yield('content')

        {{-- start footer content --}}
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        {{-- end footer content --}}
      </div>
    </div>
    
    {{-- jQuery --}}
    <script language="javascript" type="text/javascript" src="{{ asset('attachments/admin_assets/layout_assets/vendors/jquery/dist/jquery.min.js') }}" defer></script>
    {{-- Bootstrap --}}
    <script language="javascript" type="text/javascript" src="{{ asset('attachments/admin_assets/layout_assets/vendors/bootstrap/dist/js/bootstrap.min.js') }}" defer></script>
    {{-- FastClick --}}
    <script language="javascript" type="text/javascript" src="{{ asset('attachments/admin_assets/layout_assets/vendors/fastclick/lib/fastclick.js') }}" defer></script>
    {{-- NProgress --}}
    <script language="javascript" type="text/javascript" src="{{ asset('attachments/admin_assets/layout_assets/vendors/nprogress/nprogress.js') }}" defer></script>
    <script language="javascript" type="text/javascript" src="{{ asset('attachments/admin_assets/fileupload_assets/js/bootstrap-fileupload.js') }}"  defer></script>
    
    @if($PageType=='view')
      {{-- iCheck --}}
      <script language="javascript" type="text/javascript" src="{{ asset('attachments/admin_assets/layout_assets/vendors/iCheck/icheck.min.js') }}" defer></script>
      {{-- Datatables --}}
      <script language="javascript" type="text/javascript" src="{{ asset('attachments/admin_assets/layout_assets/vendors/datatables.net/js/jquery.dataTables.min.js') }}" defer></script>
      <script language="javascript" type="text/javascript" src="{{ asset('attachments/admin_assets/layout_assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}" defer></script>
      <script language="javascript" type="text/javascript" src="{{ asset('attachments/admin_assets/layout_assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}" defer></script>
      <script language="javascript" type="text/javascript" src="{{ asset('attachments/admin_assets/layout_assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}" defer></script>
      <script language="javascript" type="text/javascript" src="{{ asset('attachments/admin_assets/layout_assets/vendors/datatables.net-buttons/js/buttons.flash.min.js') }}" defer></script>
      <script language="javascript" type="text/javascript" src="{{ asset('attachments/admin_assets/layout_assets/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}" defer></script>
      <script language="javascript" type="text/javascript" src="{{ asset('attachments/admin_assets/layout_assets/vendors/datatables.net-buttons/js/buttons.print.min.js') }}" defer></script>
      <script language="javascript" type="text/javascript" src="{{ asset('attachments/admin_assets/layout_assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}" defer></script>
      <script language="javascript" type="text/javascript" src="{{ asset('attachments/admin_assets/layout_assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}" defer></script>
      <script language="javascript" type="text/javascript" src="{{ asset('attachments/admin_assets/layout_assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}" defer></script>
      <script language="javascript" type="text/javascript" src="{{ asset('attachments/admin_assets/layout_assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}" defer></script>
      <script language="javascript" type="text/javascript" src="{{ asset('attachments/admin_assets/layout_assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js') }}" defer></script>
      <script language="javascript" type="text/javascript" src="{{ asset('attachments/admin_assets/layout_assets/vendors/jszip/dist/jszip.min.js') }}" defer></script>
      <script language="javascript" type="text/javascript" src="{{ asset('attachments/admin_assets/layout_assets/vendors/pdfmake/build/pdfmake.min.js') }}" defer></script>
      <script language="javascript" type="text/javascript" src="{{ asset('attachments/admin_assets/layout_assets/vendors/pdfmake/build/vfs_fonts.js') }}" defer></script>
    @elseif($PageType=='form')
      {{-- validator --}}
      <script language="javascript" type="text/javascript" src="{{ asset('attachments/admin_assets/layout_assets/vendors/validator/validator.js') }}" defer></script>
    @endif

    @stack('additional_footer_files')
    
    {{-- Custom Theme Scripts --}}
    <script language="javascript" type="text/javascript" src="{{ asset('attachments/admin_assets/layout_assets/build/js/custom.min.js') }}" defer></script>
    
<script>
  function ajax_data(value, sel){
    if(value != ''){
      var dependent = $('#'+sel).data("dependent");
      var table = $('#'+sel).data("toggle");
      var _token = $('input[name="_token"]').val();
      $.ajax({
        method: "GET",
        url: "{{ route('ajax_request') }}",
        data: "select=" + sel + "&value=" + value  + "&_token=" + _token + "&dependent=" + dependent + "&table=" + table,
        success: function(resPonse){
          if(resPonse != ''){
            $('#'+dependent).html(resPonse);
          }
        }
      });
    }
  }
</script>
     
  </body>
</html>