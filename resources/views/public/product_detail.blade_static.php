<!DOCTYPE html>
<html lang="en" class="win-magic svg-magic" data-magic-ua="chrome" data-magic-ua-ver="74">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Magic Zoom </title>
    {{-- <link rel="stylesheet" type="text/css" href="assets/css/magiczoomplus.css" data-minify="1"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('attachments/public_assets/magic_zoom/css/magiczoomplus.css') }}" data-minify="1"/>
  </head>
  <body class=""><!--page-alias-magiczoom-->
    <div id="site-canvas">
      <div class="container tool-page tool-page-overview" id="container" style="padding-top:0px;">
        <div id="mainCont" role="main">
          <div class="row">
            <div class="col-lg-12" id="mainContainer">
              <article class="page type-page status-publish hentry">
                <div class="entry-content">
                  <div style="display:none;"></div>
                  <div class="lead superb text-center center-shadow">
                    <h2>The elegant way to show high resolution, zoomed images</h2>
                  </div>
                  <div class="row showcase-section magiczoom">
                    <div class="col-lg-6 col-md-6 text-center">
                      <div class="magiczoomplus-example tryit">
                        <table>
                          <tbody>
                            <tr>
                              <td class="selectors magiczoom">
                                <?php
                                  $WatchesName=array('01','02','03','04','05','06','07','08','09','10');
                                  foreach($WatchesName as $index => $WatchName){
                                    ?>
                                      <a title="" href="{{ asset('attachments/public_assets/magic_zoom') }}/img/watches/<?php echo $WatchName ?>_1200x1200.jpg" data-zoom-id="zoom1"
                                      data-image="{{ asset('attachments/public_assets/magic_zoom') }}/img/watches/<?php echo $WatchName ?>_1200x1200.jpg?scale.width=950" class="mz-thumb">
                                        <img alt="img_name" srcset="{{ asset('attachments/public_assets/magic_zoom') }}/img/watches/<?php echo $WatchName ?>_76x76.jpg?scale.width=154 2x"
                                        src="{{ asset('attachments/public_assets/magic_zoom') }}/img/watches/<?php echo $WatchName ?>_76x76.jpg">
                                      </a>
                                    <?php
                                  }
                                ?>
                              </td>
                              
                              <td class="main-example">
                                <a class="MagicZoom" id="zoom1" data-mobile-options="zoomMode:magnifier" data-options="variableZoom:true"
                                href="{{ asset('attachments/public_assets/magic_zoom') }}/img/watches/01_1200x1200.jpg">
                                  <figure class="mz-figure mz-hover-zoom mz-no-expand mz-ready">
                                    <img id="megnify_img" alt="" src="{{ asset('attachments/public_assets/magic_zoom') }}/img/watches/01_1200x1200.jpg"
                                    style="max-width:950px;max-height:950px;">
                                    <div class="mz-lens" style="top:0px;transform:translate(-10000px, -10000px);width:145px;height:145px;">
                                      <img src="{{ asset('attachments/public_assets/magic_zoom') }}/img/watches/01_1200x1200.jpg"
                                      style="position:absolute;top:0px;left:0px;width:430px;height:430px;transform:translate(-286px, -230.5px);">
                                    </div>
                                    <div class="mz-loading"></div>
                                    <div class="mz-hint mz-hint-hidden" style="transition-delay: 0ms;">
                                      <span class="mz-hint-message">Hover to zoom</span>
                                    </div>
                                  </figure>
                                </a>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </article>
            </div>
          </div>
        </div>
      </div>
    </div>
    {{-- <script type="text/javascript" src="assets/js/magiczoomplus.js" defer=""></script> --}}
    <script type="text/javascript" src="{{ asset('attachments/public_assets/magic_zoom/js/magiczoomplus.js') }}" defer=""></script>
    <script type="text/javascript">var mzOptions=mzOptions||{};mzOptions.expand = 'off';</script>
  </body>
</html>