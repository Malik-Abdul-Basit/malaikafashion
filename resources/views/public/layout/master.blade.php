<!DOCTYPE html>
{{-- @if($page=='PRODUCT_DETAIL')
  <html lang="{{ config('app.locale') }}" class="win-magic svg-magic" data-magic-ua="chrome" data-magic-ua-ver="74">
@else --}}
  <html lang="{{ config('app.locale') }}" class="no-js no-svg">
{{-- @endif --}}


  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    {{-- CSRF Token  --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ ucwords(str_replace('_', ' ', $title)) }}</title>
	<script type="application/x-javascript">
      addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); }
    </script>
    {{-- <link rel="profile" href="http://gmpg.org/xfn/11"> --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto%3A300%2C400%2C500%2C600%2C700%2C800%2C900%26amp%3Bsubset%3Dlatin%2Clatin-ext%7CLato%3A300%2C400%2C500%2C600%2C700%2C800%2C900%26amp%3Bsubset%3Dlatin%2Clatin-ext%7CRaleway%3A300%2C400%2C500%2C600%2C700%2C800%2C900%26amp%3Bsubset%3Dlatin%2Clatin-ext%7CLato%3A400%2C700%7CRoboto%3A400%2C500%2C700%7CRoboto%3A400%2C700%7CLato%3A400%2C300&subset=" />
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset('attachments/public_assets/layout_assets/cache/min/1/42fce79feda89463edcc1be9634f7036.css') }}" data-minify="1" />
    <style>.wishlist_table .add_to_cart,a.add_to_wishlist.button.alt{border-radius:16px;-moz-border-radius:16px;-webkit-border-radius:16px}</style>
    <link rel="stylesheet" type="text/css" id="woocommerce-smallscreen-css" media="all" href="{{ asset('attachments/public_assets/layout_assets/plugins/woocommerce/assets/css/woocommerce-smallscreen.css')}}" media="only screen and (max-width:768px)"/>
    <style id='woocommerce-inline-inline-css' type='text/css'>.woocommerce form .form-row .required{visibility:visible}</style>
    <style id='woo-variation-swatches-inline-css' type='text/css'>
      .variable-item:not(.radio-variable-item){width:30px;height:30px}
	  .woo-variation-swatches-style-squared .button-variable-item{min-width:30px}.button-variable-item span{font-size:16px}
    </style>
	<link rel="stylesheet" type="text/css" href="{{ asset('attachments/public_assets/layout_assets/themes/woochi/assets/css/inner_style1.css') }}"/>
      <script language="javascript" type="text/javascript" src="{{ asset('attachments/public_assets/layout_assets/themes/woochi/assets/js/inner_script1.js') }}" defer></script>
      <link rel="stylesheet" type="text/css" media="all" href="{{ asset('attachments/public_assets/layout_assets/themes/woochi/assets/css/inner_style2.css') }}"/>    
    <noscript><style>.woocommerce-product-gallery{opacity:1!important}</style></noscript>
    <noscript><style type="text/css">.wpb_animate_when_almost_visible{opacity:1}</style></noscript>
    
    @stack('additional_header_files')
  </head>
  
  <body class="page-template-default page woocommerce-no-js yith-wcan-free woo-variation-swatches woo-variation-swatches-theme-woochi woo-variation-swatches-theme-child-woochi woo-variation-swatches-style-squared woo-variation-swatches-attribute-behavior-blur woo-variation-swatches-tooltip-enabled woo-variation-swatches-stylesheet-enabled group-blog has-header-image colors-light wpb-js-composer js-comp-ver-5.7 vc_responsive dokan-theme-woochi">
    <div class="ftc-mobile-wrapper">
      {{-- <!--<div class="mutil-lang-cur" style="display:none !important; opacity:0">
        <div class="ftc-sb-language">
          <div id="ftc_language" class="ftc_language">
            <ul>
              <li>
                <a href="#" class="ftc_lang ftc_lang_eng">
                  English <i class="fa fa-angle-down" aria-hidden="true"></i>
                </a>
                <ul style="visibility: hidden;">
                  <li class="ftc_lang_fran"><a rel="alternate" href="#">Francais </a></li>
                  <li class="ftc_lang_esp"><a rel="alternate" href="#">Espanol </a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
        <div class="header-currency">
          <div class="ftc-currency">
            <a href="javascript: void(0)" class="ftc-currency-selector">
              USD<i class="fa fa-angle-down" aria-hidden="true"></i>
            </a>
            <ul>
              <li rel="USD">Dollar (USD)</li>
              <li rel="EUR">Euro (EUR)</li>
            </ul>
          </div>
        </div>
      </div>-->
      <!--<div class="ftc-search" style="display:none !important; opacity:0">
        <form method="get" id="searchform994" action="">
          <select class="select-category" name="term">
            <option value="">All categories</option>
            <option value="uncategorized">Uncategorized</option>
            <option value="bakeware">Bakeware</option>
            <option value="accessories">&nbsp;&nbsp;&nbsp;Accessories</option>
            <option value="shoes-girls">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Shoes</option>
            <option value="coats-black">Coats Black</option>
            <option value="coats-green">Coats Green</option>
            <option value="dark-men">Dark Men</option>
            <option value="dinner-entertaining">Dinner and Entertaining</option>
            <option value="evening-dinner-dinner-entertaining">&nbsp;&nbsp;&nbsp;Evening Dinner</option>
            <option value="sale-off">Discount</option>
            <option value="gift-for-men">Gift for men</option>
            <option value="jackets">&nbsp;&nbsp;&nbsp;Jackets</option>
            <option value="lookbook">LookBook</option>
            <option value="pants-black">Pants Black</option>
            <option value="pants-gray">Pants Gray</option>
            <option value="girls">Women</option>
            <option value="dresses">&nbsp;&nbsp;&nbsp;Dresses</option>
            <option value="earings">&nbsp;&nbsp;&nbsp;Earings</option>
            <option value="hat">&nbsp;&nbsp;&nbsp;Hat</option>
          </select>
          <div class="ftc_search_ajax">
            <input type="text" value="" name="s" id="s994" placeholder="Search..." autocomplete="off" />
            <input type="hidden" name="post_type" value="product" />
            <input type="hidden" name="taxonomy" value="product_cat" />
            <button type="submit" class="search-button"></button>
          </div>
        </form>
      </div>--> --}}
      <div class="menu-text">
        <button type="button" class="btn btn-toggle-canvas btn-danger" data-toggle="offcanvas">
          <i class="fa fa-close"></i> 
        </button>
        <i class="fa fa-bars"></i> Menu
      </div>
      
      <?php
        /*$MainMenuArray=array(
          'HOME' => '0',
          'ABOUT US' => '0',
          'PRODUCTS' => '1',
          'SERVICES' => '0',
          'CONTACT US' => '0'
        );*/
		$categories = DB::table('categories')->where('status', 'a')->orderBy('position', 'asc')->get();
        $MainMenuArray=array(
          'HOME' => '0',
          'ABOUT US' => '0',
          'PRODUCTS' => '1',
          'CONTACT US' => '0'
        );
      ?>
      
      <div class="mobile-menu-wrapper">
        <div id="mega_main_menu" class="primary primary_style-flat icons-left first-lvl-align-center first-lvl-separator-none direction-horizontal fullwidth-disable pushing_content-disable mobile_minimized-enable dropdowns_trigger-hover dropdowns_animation-anim_3 no-logo no-search no-woo_cart no-buddypress responsive-enable coercive_styles-disable indefinite_location_mode-disable language_direction-ltr version-2-1-5 mega_main mega_main_menu">
          <div class="menu_holder">
            <div class="mmm_fullwidth_container"></div>
            <div class="menu_inner">
              <span class="nav_logo">
                <a class="mobile_toggle">
                  <span class="mobile_button">
                    Menu &nbsp;
                    <span class="symbol_menu">&equiv;</span>
                    <span class="symbol_cross">&#x2573;</span>
                  </span>
                </a>
              </span>
              <ul id="mega_main_menu_ul" class="mega_main_menu_ul">
                
                @foreach($MainMenuArray as $MenuName => $hasChild)
                  <li class="menu-item submenu_default_width
                  @if($page==$MenuName) current-menu-ancestor @endif
                  @if($hasChild==1) menu-item-has-children default_dropdown default_style drop_to_right @endif">
                    <a @if($hasChild==0) href="{{ route($MenuName) }}" @endif title="{{ ucwords($MenuName) }}" class="item_link disable_icon">
                      <i class=""></i>
                      <span class="link_content">
                        <span class="link_text"> {{ ucwords($MenuName) }} </span>
                      </span>
                    </a>
                    @if($hasChild==1 && $MenuName=='PRODUCTS')
                      @if(count($categories)>0)
                        <ul class="mega_dropdown">
                          @foreach($categories as $index => $category)
                            <li class="menu-item submenu_default_width default_dropdown default_style drop_to_right">
                              <a title="{{ ucwords($category->heading) }}" href="{{ route('products_', [$category->id]) }}" class="item_link disable_icon">
                                <i class=""></i>
                                <span class="link_content">
                                  <span class="link_text"> {{ ucwords($category->heading) }} </span>
                                </span>
                              </a>
                            </li>
                          @endforeach
                        </ul>
                      @endif
                    @endif
                  </li>
                
                @endforeach
                
                {{--<!--<li class="menu-item submenu_default_width menu-item-has-children default_dropdown default_style drop_to_right" style="display:none !important; opacity:0">
                  <a title="VENDORS" class="item_link disable_icon">
                    <i class=""></i>
                    <span class="link_content">
                      <span class="link_text"> VENDORS </span>
                    </span>
                  </a>
                  <ul class="mega_dropdown">
                    <li class="menu-item submenu_default_width menu-item-has-children default_dropdown default_style drop_to_right">
                      <a title="DOKAN LIST" class="item_link disable_icon">
                        <i class=""></i>
                        <span class="link_content">
                          <span class="link_text"> DOKAN LIST </span>
                        </span>
                      </a>
                      <ul class="mega_dropdown">
                        <li class="menu-item submenu_default_width default_dropdown default_style drop_to_right">
                          <a title="DOKAN 1" href="#" class="item_link disable_icon">
                            <i class=""></i>
                            <span class="link_content">
                              <span class="link_text"> DOKAN 1 </span>
                            </span>
                          </a>
                        </li>
                        <li class="menu-item submenu_default_width default_dropdown default_style drop_to_right">
                          <a title="DOKAN 2" href="#" class="item_link disable_icon">
                            <i class=""></i>
                            <span class="link_content">
                              <span class="link_text"> DOKAN 2 </span>
                            </span>
                          </a>
                        </li>
                        <li class="menu-item submenu_default_width default_dropdown default_style drop_to_right">
                          <a title="DOKAN 2" href="#" class="item_link disable_icon">
                            <i class=""></i>
                            <span class="link_content">
                              <span class="link_text"> DOKAN 3 </span>
                            </span>
                          </a>
                        </li>
                      </ul>
                    </li>
                    
                    <li class="menu-item submenu_default_width menu-item-has-children default_dropdown default_style drop_to_right">
                      <a title="WC VENDOR LIST" class="item_link disable_icon">
                        <i class=""></i>
                        <span class="link_content">
                          <span class="link_text"> WC VENDOR LIST </span>
                        </span>
                      </a>
                      <ul class="mega_dropdown">
                        <li class="menu-item submenu_default_width default_dropdown default_style drop_to_right">
                          <a title="WC VENDOR 1" href="#" class="item_link disable_icon">
                            <i class=""></i>
                            <span class="link_content">
                              <span class="link_text"> WC VENDOR 1 </span>
                            </span>
                          </a>
                        </li>
                      </ul>
                    </li>
                    <li class="menu-item submenu_default_width default_dropdown default_style drop_to_right">
                      <a title="MY ORDERS" href="#" class="item_link disable_icon">
                        <i class=""></i>
                        <span class="link_content">
                          <span class="link_text"> MY ORDERS </span>
                        </span>
                      </a>
                    </li>
                  </ul>
                </li>-->--}}
              </ul>
            </div>
          </div>
        </div>
      </div>
      
    </div>
    <div id="page" class="site">
      <a class="skip-link screen-reader-text" href="#"></a>
      <header id="masthead" class="site-header">
        <div class="header-ftc header-layout1">
          {{-- <!--<div id="header-n" class="header-nav" style="display:none !important; opacity:0">
            <div class="container">
              <div class="nav-left">
                <div class="ftc-sb-language">
                  <div id="ftc_language" class="ftc_language">
                    <ul>
                      <li> 
                        <a href="#" class="ftc_lang ftc_lang_eng">English<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                        <ul style="visibility: hidden;">
                          <li class="ftc_lang_fran"><a rel="alternate" href="#">Francais </a></li>
                          <li class="ftc_lang_esp"><a rel="alternate" href="#">Espanol </a></li>
                        </ul>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="header-currency">
                  <div class="ftc-currency">
                    <a href="javascript: void(0)" class="ftc-currency-selector">USD<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                    <ul>
                      <li rel="USD">Dollar (USD)</li>
                      <li rel="EUR">Euro (EUR)</li>
                    </ul>
                  </div>
                </div>
                <span class="header_center">Default welcome msg!</span>
              </div>
              <div class="nav-right">
                <div class="ftc-sb-account">
                  <div class="ftc-account">
                    <div class="ftc_login">
                      <a class="login" href="#" title="Login"><span>Login</span></a>
                      <a class="ftc_sign_up" href="#" title="Create New Account"><span>Sign up</span></a>
                    </div>
                    <div class="ftc_account_form dropdown-container">
                      <form name="ftc-login-form" class="ftc-login-form" action="" method="post">
                        <p class="login-username">
                          <label>Username</label>
                          <input type="text" name="log" class="input" value="" size="20" autocomplete="off">
                        </p>
                        <p class="login-password">
                          <label>Password</label>
                          <input type="password" name="pwd" class="input" value="" size="20">
                        </p>
                        <p class="login-submit">
                          <input type="submit" name="wp-submit" class="button-secondary button" value="Login">
                          <input type="hidden" name="redirect_to" value="">
                        </p>
                      </form>
                      <p class="ftc_forgot_pass">
                        <a href="#" title="Forgot Your Password?">Forgot Your Password?</a>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="ftc-my-wishlist">
                  <a title="Wishlist" href="#" class="tini-wishlist">
                    <i class="fa fa-heart"></i> Wishlist <span class="count-wish">(0)</span>
                  </a>
                </div>
                <div class="ftc-sb-checkout">
                  <a href="#" class="checkout">Checkout</a>
                </div>
              </div>
            </div>
          </div>-->--}}
          <div class="header-content">
            <div class="header-content-sticky header-sticky">
              <div class="container">
                <div class="mobile-button">
                  <div class="mobile-nav"> <i class="fa fa-bars"></i></div>
                </div>
                <div class="logo-wrapper is-desktop">
                  <div class="logo">
                    <a href="{{ route('HOME') }}" class="custom-logo-link">
                      <?php
                        $get_img = DB::table('logos')->where('status','a')->value('image');
                        if(empty($get_img)){
                          $logo_img = asset('uploads/logos/default/8hib-sd1_4fb0fc1_4kio140p.oi90s8asd89.0f017kai8.png');
                        }
                        else{
                          $logo_img = asset('uploads/logos/'.$get_img);
                        }
                      ?>
                      <img id="logo" src="{{ $logo_img }}" alt="Site Logo" title="Site Logo" class="normal-logo" />
                    </a>
                  </div>
                </div>
                <div class="logo-wrapper is-mobile">
                  <div class="logo">
                    <a href="{{ route('HOME') }}">
                      <img src="{{ $logo_img }}" alt="Site Logo" title="Site Logo" class="normal-logo-mobile" />
                    </a>
                  </div>
                </div>
                <div class="navigation-primary">
                  <nav id="site-navigation" class="main-navigation" aria-label="Primary Menu">
                    <div id="mega_main_menu" class="primary primary_style-flat icons-left first-lvl-align-center first-lvl-separator-none direction-horizontal fullwidth-disable pushing_content-disable mobile_minimized-enable dropdowns_trigger-hover dropdowns_animation-anim_3 no-logo no-search no-woo_cart no-buddypress responsive-enable coercive_styles-disable indefinite_location_mode-disable language_direction-ltr version-2-1-5 mega_main mega_main_menu">
                      <div class="menu_holder">
                        <div class="mmm_fullwidth_container"></div>
                        <div class="menu_inner">
                          <span class="nav_logo">
                            <a class="mobile_toggle">
                              <span class="mobile_button"> Menu &nbsp;
                                <span class="symbol_menu">&equiv;</span>
                                <span class="symbol_cross">&#x2573;</span>
                              </span>
                            </a>
                          </span>
                          
                          <ul id="mega_main_menu_ul" class="mega_main_menu_ul">
                            
                            @foreach($MainMenuArray as $MenuName => $hasChild)
                              <li class="menu-item submenu_default_width
                              @if($page==$MenuName) current-menu-ancestor @endif
                              @if($hasChild==1) menu-item-has-children default_dropdown default_style drop_to_right @endif">
                                <a @if($hasChild==0) href="{{ route($MenuName) }}" @endif title="{{ ucwords($MenuName) }}" class="item_link disable_icon">
                                  <i class=""></i>
                                  <span class="link_content">
                                    <span class="link_text"> {{ ucwords($MenuName) }} </span>
                                  </span>
                                </a>
                                @if($hasChild==1 && $MenuName=='PRODUCTS')
                                  @if(count($categories)>0)
                                    <ul class="mega_dropdown">
                                      @foreach($categories as $index => $category)
                                        <li class="menu-item submenu_default_width default_dropdown default_style drop_to_right">
                                          <a title="{{ ucwords($category->heading) }}" href="{{ route('products_', [$category->id]) }}" class="item_link disable_icon">
                                            <i class=""></i>
                                            <span class="link_content">
                                              <span class="link_text"> {{ ucwords($category->heading) }} </span>
                                            </span>
                                          </a>
                                        </li>
                                      @endforeach
                                    </ul>
                                  @endif
                                @endif
                              </li>
                            @endforeach
                            
                            {{--<!--<li class="menu-item submenu_default_width menu-item-has-children default_dropdown default_style drop_to_right" style="display:none !important; opacity:0">
                              <a title="VENDORS" class="item_link disable_icon">
                                <i class=""></i>
                                <span class="link_content">
                                  <span class="link_text"> VENDORS </span>
                                </span>
                              </a>
                              <ul class="mega_dropdown">
                                <li class="menu-item submenu_default_width menu-item-has-children default_dropdown default_style drop_to_right">
                                  <a title="DOKAN LIST" class="item_link disable_icon">
                                    <i class=""></i>
                                    <span class="link_content">
                                      <span class="link_text"> DOKAN LIST </span>
                                    </span>
                                  </a>
                                  <ul class="mega_dropdown">
                                    <li class="menu-item submenu_default_width default_dropdown default_style drop_to_right">
                                      <a title="DOKAN 1" href="#" class="item_link disable_icon">
                                        <i class=""></i>
                                        <span class="link_content">
                                          <span class="link_text"> DOKAN 1 </span>
                                        </span>
                                      </a>
                                    </li>
                                    <li class="menu-item submenu_default_width default_dropdown default_style drop_to_right">
                                      <a title="DOKAN 2" href="#" class="item_link disable_icon">
                                        <i class=""></i>
                                        <span class="link_content">
                                          <span class="link_text"> DOKAN 2 </span>
                                        </span>
                                      </a>
                                    </li>
                                    <li class="menu-item submenu_default_width default_dropdown default_style drop_to_right">
                                      <a title="DOKAN 3" href="#" class="item_link disable_icon">
                                        <i class=""></i>
                                        <span class="link_content">
                                          <span class="link_text"> DOKAN 3 </span>
                                        </span>
                                      </a>
                                    </li>
                                  </ul>
                                </li>
                                <li class="menu-item submenu_default_width menu-item-has-children default_dropdown default_style drop_to_right">
                                  <a title="WC VENDOR LIST" class="item_link disable_icon">
                                    <i class=""></i>
                                    <span class="link_content">
                                      <span class="link_text"> WC VENDOR LIST </span>
                                    </span>
                                  </a>
                                  <ul class="mega_dropdown">
                                    <li class="menu-item submenu_default_width default_dropdown default_style drop_to_right">
                                      <a title="WC VENDOR 1" href="#" class="item_link disable_icon">
                                        <i class=""></i>
                                        <span class="link_content">
                                          <span class="link_text"> WC VENDOR 1 </span>
                                        </span>
                                      </a>
                                    </li>
                                  </ul>
                                </li>
                                <li class="menu-item submenu_default_width default_dropdown default_style drop_to_right">
                                  <a title="MY ORDERS" href="#" class="item_link disable_icon">
                                    <i class=""></i>
                                    <span class="link_content">
                                      <span class="link_text"> MY ORDERS </span>
                                    </span>
                                  </a>
                                </li>
                              </ul>
                            </li>-->--}}
                            
                          </ul>
                        </div>
                      </div>
                    </div>
                  </nav>
                </div>
                {{-- <!--<div class="ftc-shop-cart" style="display:none !important;opacity:0">
                  <div class="ftc-shoppping-cart">
                    <a class="ftc_cart cart-item-canvas" href="#" title="View your shopping bag"> <span class="cart-number">0</span> </a>
                  </div>
                </div>-->
                <!--<div class="ftc-search-product" style="display:none !important;opacity:0">
                  <div class="ftc-search">
                    <form method="get" id="searchform968" action="">
                      <select class="select-category" name="term">
                        <option value="">All categories</option>
                        <option value="uncategorized">Uncategorized</option>
                      </select>
                      <div class="ftc_search_ajax">
                        <input type="text" value="" name="s" id="s968" placeholder="Search..." autocomplete="off" />
                        <input type="hidden" name="post_type" value="product" />
                        <input type="hidden" name="taxonomy" value="product_cat" />
                        <button type="submit" class="search-button"></button>
                      </div>
                    </form>
                  </div>
                </div>--> --}}
              </div>
            </div>
          </div>
        </div>
      </header>
      
      <div class="site-content-contain">
        @yield('content')
        
        
        
        
        <footer id="colophon" class="site-footer">
          <div class="container top-footer">
            <div class="widget-column footer-top">
              <div id="ftc_footer-5" class="widget ftc-footer"></div>
            </div>
          </div>
          <div class="widget-column footer-middle">
            <div class="container">
              <div id="ftc_footer-6" class="widget ftc-footer">
                <div class="vc_row wpb_row vc_row-fluid vc_custom_1503022172415 ftc-row-wide">
                  
                  
                  <div class="column-intro wpb_column vc_column_container vc_col-sm-3">
                    <div class="wpb_wrapper">
                      <div class="wpb_text_column wpb_content_element ">
                        <div class="wpb_wrapper">
                          <p style="line-height: 23px; margin:0 0 15px 0!important;overflow:hidden">
                            <img class="alignnone size-full wp-image-2615" 
                            src="{{ asset('uploads/logos') }}/footerlogo.png" alt="" width="50px" style="float:left;" />
                            <span style="float:left;display:inline-block;margin:23px 0 0 15px">SILKLONDON<small>LTD</small></span>
                          </p>
                          <p style="line-height: 23px;">
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                            Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis.
                            Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede ...
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  
                  <div class="wpb_column vc_column_container vc_col-sm-3">
                    <div class="wpb_wrapper" style="padding: 0 0 0 30px;">
                      <div class="wpb_text_column wpb_content_element ">
                        <div class="wpb_wrapper">
                          <h4 class="widget-title heading-title">My account</h4>
                          <p>
                            <a href="{{ route('HOME') }}" title="HOME">Home</a><br/>
                            <a href="{{ route('ABOUT US') }}" title="ABOUT US">About Us</a><br/>
                            <a href="{{ route('CONTACT US') }}" title="CONTACT US">Contact Us</a><br/>
                            <a href="#">Privacy Policy</a><br/>
                            <a href="#">Terms &amp; Conditions</a><br/>
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  
                  <div class="wpb_column vc_column_container vc_col-sm-3">
                    <div class="wpb_wrapper">
                      <div class="wpb_text_column wpb_content_element ">
                        <div class="wpb_wrapper">
                          <h4 class="widget-title heading-title">Follow Us</h4>
                                                    
                          <p style="overflow:hidden">
                            <span style="color:#fff; float:left;padding:0 5px;">
                              <strong><i class="fa fa-twitter" aria-hidden="true"></i></strong>
                              &nbsp;&nbsp;&nbsp;
                            </span>
                            <a title="Silklondonltd" href="https://www.instagram.com/silklondonltd/" target="_blank">Silklondonltd</a>
                          </p>
                          
                          <p style="overflow:hidden">
                            <span style="color:#fff; float:left;padding:0 5px;">
                              <strong><i class="fa fa-facebook" aria-hidden="true"></i></strong>
                              &nbsp;&nbsp;&nbsp;
                            </span>
                            <a title="Silklondonltd" href="https://www.facebook.com/silklondonltd/" target="_blank">Silklondonltd</a>
                          </p>
                          
                          <p style="overflow:hidden">
                            <span style="color:#fff; float:left;padding:0 5px;">
                              <strong><i class="fa fa-instagram" aria-hidden="true"></i></strong>
                              &nbsp;&nbsp;&nbsp;
                            </span>
                            <a title="Silklondonltd" href="https://www.instagram.com/silklondonltd/" target="_blank">Silklondonltd</a>
                          </p>
                          
                          <p style="overflow:hidden">
                            <span style="color:#fff; float:left;padding:0 5px;">
                              <strong><i class="fa fa-link" aria-hidden="true"></i></strong>
                              &nbsp;&nbsp;&nbsp;
                            </span>
                            <a title="www.silklondonltd.com" href="{{ route('HOME') }}">www.silklondonltd.com</a>
                          </p>

                          
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  
                  <div class="wpb_column vc_column_container vc_col-sm-3">
                    <div class="wpb_wrapper">
                      <div class="wpb_text_column wpb_content_element ">
                        <div class="wpb_wrapper">
                          <div class="info-com">
                            <h4 class="widget-title heading-title">Contact us</h4>
                            
                            <p style="overflow:hidden">
                              <span style="color:#fff; float:left;padding:0 5px;">
                                <strong><i class="fa fa-phone" aria-hidden="true"></i></strong>
                                &nbsp;&nbsp;&nbsp;
                              </span>
                              <em style="float:left;font-style: normal">+44 786 780 78 84</em>
                            </p>
                            
                            <p style="overflow:hidden">
                              <span style="color:#fff; float:left;padding:0 5px;">
                                <strong><i class="fa fa-whatsapp" aria-hidden="true"></i></strong>
                                &nbsp;&nbsp;&nbsp;
                              </span>
                              <em style="float:left;font-style: normal">+44 787 953 35 57</em>
                            </p>
                            
                            <p style="overflow:hidden">
                              <span style="color:#fff; float:left;padding:0 5px;">
                                <strong><i class="fa fa-envelope" aria-hidden="true"></i></strong>
                                &nbsp;&nbsp;&nbsp;
                              </span>
                              <a title="naveed@silklondonltd.com" href="mailto:naveed@silklondonltd.com">naveed@silklondonltd.com</a>
                            </p>
                            
                            <p style="overflow:hidden">
                              <span style="color:#fff; float:left;padding:0 5px;">
                                <strong><i class="fa fa-map-marker" aria-hidden="true"></i></strong>
                                &nbsp;&nbsp;&nbsp;
                              </span>
                              <em style="float:left;font-style: normal">
                                24 Belgrave Road, Ilford, IG1 3AW <br>
                                London / UK
                              </em>
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                </div>
                <div class="vc_row wpb_row vc_row-fluid vc_custom_1502964136561 ftc-row-wide">
                  <div class="wpb_column vc_column_container vc_col-sm-12 vc_custom_1502964275550">
                    <div class="wpb_wrapper"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="widget-column footer-bottom">
            <div class="container">
              <div id="ftc_footer-7" class="widget ftc-footer">
                <div class="vc_row wpb_row vc_row-fluid vc_custom_1503558899907 ftc-row-wide">
                  <div class="wpb_column vc_column_container vc_col-sm-12">
                    <div class="wpb_wrapper">
                      <div class="wpb_text_column wpb_content_element ">
                        <div class="wpb_wrapper">
                          <ul class="bottom-foot">
                            <li style="text-align: center;"><a href="#">HOME</a> |</li>
                            <li style="text-align: center;"><a href="#">NEW PRODUCTS</a> |</li>
                            <li style="text-align: center;"><a href="#">SALE PRODUCTS</a> |</li>
                            <li style="text-align: center;"><a href="#">BEST SELLER</a> |</li>
                            <li style="text-align: center;"><a href="#">ABout us</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="vc_row wpb_row vc_row-fluid bottom_text vc_custom_1522826676874 ftc-row-wide">
                  <div class="wpb_column vc_column_container vc_col-sm-12">
                    <div class="wpb_wrapper">
                      <div class="wpb_text_column wpb_content_element ">
                        <div class="wpb_wrapper">
                          <p>Copyright <?php echo date('Y'); ?> by <a href="#">The Instant Solutions</a>. All Rights Reserved.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </footer>
        
        
      </div>
    </div>
    <div class="ftc-close-popup"></div>
    
    
    <div class="footer-mobile" style="display:none !important">
      <div class="mobile-home">
        <a href="#"> <i class="fa fa-home"></i> Home </a>
      </div>
      <div class="mobile-view-cart">
        <a href="#"> <i class="fa fa-shopping-bag"></i> Cart <span class="footer-cart-number"> (0)</span> </a>
      </div>
      <div class="mobile-wishlist">
        <div class="ftc-my-wishlist">
          <a title="Wishlist" href="#" class="tini-wishlist"> <i class="fa fa-heart"></i> Wishlist <span class="count-wish">(0)</span> </a>
        </div>
      </div>
      <div class="mobile-account">
        <a href="#" title="Login"> <i class="fa fa-user"></i> Login </a>
      </div>
    </div>
    
    
    
    <div id="to-top" class="scroll-button"> <a class="scroll-button" href="javascript:void(0)" title="Back to Top">Back to Top</a></div>
    <div class="ftc-off-canvas-cart" style="display:none !important">
      <div class="off-canvas-cart-title">
        <div class="title">Shopping Cart</div>
        <a class="close-cart"> Close</a>
      </div>
      <div class="off-can-vas-inner">
        <div class="woocommerce widget_shopping_cart">
          <div class="widget_shopping_cart_content">
            <p class="woocommerce-mini-cart__empty-message">No products in the cart.</p>
          </div>
        </div>
      </div>
    </div>
                  @yield('script')
      <script language="javascript" type="text/javascript" src="{{ asset('attachments/public_assets/layout_assets/cache/min/1/d12fef46143ebcece751608ebe7415b3.js') }}" data-minify="1" defer></script>
    
    @stack('additional_footer_files')
</body>

</html>
