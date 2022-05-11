@extends('admin.layout.master')
@push('additional_header_files')
    <link href="{{ asset('attachments/admin_assets/filecrop_assets/css/category_img.css') }}" rel="stylesheet">
    <link href="{{ asset('attachments/admin_assets/filecrop_assets/css/img_crop.css') }}" rel="stylesheet">
@endpush

@section('content')
        {{-- start page content --}}
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>
                  <?php
                    if($page=='category_form'){
                      $heading = 'Add Category';
                      $xheading = 'Add Category Info';
                      $action = 'admin/category-add';
                    }
                    else{
                      $heading = 'Edit Category';
                      $xheading = 'Edit Category Info';
                      $action = 'admin/category-edit/'.$category->id;
					}
                  ?>
                  {{ $heading }}
                </h3>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>{{ $xheading }}</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    {{ Form::open(array('url'=>$action,'class'=>'form-horizontal form-label-left','enctype'=>'multipart/form-data')) }}
                      
                      {{-- heading --}}
                      <div class="item form-group">
                        {{ Form::label('heading', 'Heading *', array('class'=>'control-label col-md-2 col-sm-2 col-xs-12')) }}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          @if($page=='edit_category_form')
                          <input type="text" name="heading" value="{{ old('heading', $category->heading) }}" class="form-control col-md-8 col-sm-8 col-xs-12" required="required">
                          @else
                          {{ Form::text('heading',old("heading"), array('id'=>'heading','class'=>'form-control col-md-8 col-sm-8 col-xs-12','required'=>'required')) }}
                          @endif
                        </div>
                        @if ($errors->has('heading'))
                         <div class="alert">{{ $errors->first('heading') }}</div>
                        @endif
                      </div>
                      
                      {{-- position --}}
                      <div class="item form-group">
                        {{ Form::label('position', 'Position *', array('class'=>'control-label col-md-2 col-sm-2 col-xs-12')) }}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          @if($page=='edit_category_form')
                          <input type="text" name="position" value="{{ old('position', $category->position) }}" class="form-control col-md-8 col-sm-8 col-xs-12" required="required">
                          @else
                          {{ Form::number('position',old("position"), array('id'=>'position','class'=>'form-control col-md-8 col-sm-8 col-xs-12','min'=>'1','max'=>'99999999','required'=>'required')) }}
                          @endif
                        </div>
                        @if ($errors->has('position'))
                         <div class="alert">{{ $errors->first('position') }}</div>
                        @endif
                      </div>
                      
                      
                      {{-- image --}}
                      <div class="item form-group">
                        {{ Form::label('image', 'Image', array('class'=>'control-label col-md-2 col-sm-2 col-xs-12')) }}
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <div class="image-editor" style="width: 100%;float: left;overflow: hidden;">
                            <div class="cropit-preview" @if($page=='edit_category_form') style="background-image:url({{ asset('uploads/categories') }}/{{ $category->image }})" @endif></div>
                            
                            <small>&nbsp; &nbsp;Upload image minimum 380x260</small><br /><br /><br />
                            @if ($errors->has('image'))
                             <div class="alert">{{ $errors->first('image') }}</div>
                            @endif
                            <div class="crop_imp_all_inputs_par">
                              <div class="InputFile">
                                <span class="image-input-browse-button" id="image-input-browse-button">Browse</span>
                              </div>
                              <div class="Rotatebuttons">
                                <a class="rotate-ccw">Rotate X</a>
                                <a class="rotate-cw">Rotate Y</a>
                              </div>
                              <button id="send" type="submit" class="btn btn-success export">Submit</button>
                              {{ Form::file('image',array('id'=>'cropit-image-input','class'=>'cropit-image-input','style'=>'display:none','accept'=>'image/*')) }}
                              {{ Form::textarea('base64ImgName',null,array('id'=>'image_show','rows'=>'15','cols'=>'150','style'=>'display:none')) }}
                            </div>
                          </div>
                        </div>
                      </div>
                      
                      {{-- <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button id="send" type="submit" class="btn btn-success export">Submit</button>
                        </div>
                      </div> --}}
                    {{ Form::close() }}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        {{-- end page content --}}
@endsection

@push('additional_footer_files')
<script language="javascript" type="text/javascript" src="{{ asset('attachments/admin_assets/filecrop_assets/js/jquery_cropit.js') }}" defer></script>
<script language="javascript" type="text/javascript" src="{{ asset('attachments/admin_assets/filecrop_assets/js/jquery_cropping_function.js') }}" defer></script>
@if($page=='edit_category_form')
<script language="javascript" type="text/javascript" src="{{ asset('attachments/admin_assets/filecrop_assets/js/edit_image.js') }}" defer></script>
@endif

@endpush