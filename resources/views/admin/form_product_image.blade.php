@extends('admin.layout.master')
@push('additional_header_files')
    <link href="{{ asset('attachments/admin_assets/layout_assets/vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">
    <link href="{{ asset('attachments/admin_assets/filecrop_assets/css/product_img.css') }}" rel="stylesheet">
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
                    if($page=='add_product_images'){
                      $heading = 'Add Product image';
                      $xheading = 'Add Product image';
                      $action = 'admin/product-image-add';
                    }
                    else{
                      $heading = 'Edit  Product image';
                      $xheading = 'Edit  Product image Info';
                      $action = 'admin/product-image-edit/'.$product_image->id;
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
                      
                      {{-- category_id --}}
                      <div class="item form-group">
                        {{ Form::label('category_id', 'Category *', array('class'=>'control-label col-md-2 col-sm-2 col-xs-12')) }}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php
                            if($page=='edit_product_image'){
                              $pro_selected=$product_image->product_id;
                              $data = DB::table("products")
                                ->where('id','=', $pro_selected)
                                ->orderBy('id','desc')
                                ->limit(1)
                                ->first();
                              $cat_selected=$data->category_id;
                              
							  $data_pro = DB::table("products")
                                ->where('category_id','=', $cat_selected)
                                ->orderBy('id','desc')
                                ->get()->pluck('heading','id');
                              
                              if($product_image->set_main==1){$setmain = 'checked="checked"'; }
                              else{ $setmain = ''; }
							  
                              if($product_image->set_hover==1){ $sethover = 'checked="checked"'; }
                              else{ $sethover = ''; }
							  
							  
                            }
                            else{ $cat_selected=$pro_selected=0;$setmain=$sethover=''; }
							$sele='';
                          ?>
                          <select name="category_id" id="category_id" class="form-control col-md-8 col-sm-8 col-xs-12" required
                          data-toggle="products" data-dependent="product_id" onChange="ajax_data(this.value, this.id)">
                            <option value="0">Select Category</option>
                            @forelse($categories as $index => $category)
                              <option value="{{ $category->id }}" @if($category->id==$cat_selected) selected @endif > {{ $category->heading }}</option>
                            @endforeach
                          </select>
                        </div>
                        @if ($errors->has('category_id'))
                         <div class="alert">{{ $errors->first('category_id') }}</div>
                        @endif
                      </div>
                      
                      {{-- product_id --}}
                      <div class="item form-group">
                        {{ Form::label('product_id', 'Product *', array('class'=>'control-label col-md-2 col-sm-2 col-xs-12')) }}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          @if($page=='edit_product_image')
                            {{ Form::select('product_id', $data_pro, $pro_selected,
                            array('id'=>'product_id','class'=>'form-control col-md-8 col-sm-8 col-xs-12','required'=>'required')) }}
                          @else
                            <select id="product_id" class="form-control col-md-8 col-sm-8 col-xs-12" required name="product_id"></select>
                          @endif
                        </div>
                        @if ($errors->has('product_id'))
                         <div class="alert">{{ $errors->first('product_id') }}</div>
                        @endif
                      </div>
                      
                      {{-- set_main --}}
                      <div class="item form-group">
                        {{ Form::label('set_main', 'Main Image', array('class'=>'control-label col-md-2 col-sm-2 col-xs-12')) }}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="checkbox">
                            <input name="set_main" type="checkbox" value="1" class="flat" id="set_main" <?php echo $setmain; ?>> 
                          </div>
                        </div>
                        @if ($errors->has('set_main'))
                         <div class="alert">{{ $errors->first('set_main') }}</div>
                        @endif
                      </div>
                      
                      {{-- set_hover --}}
                      <div class="item form-group">
                        {{ Form::label('set_hover', 'Hover Image', array('class'=>'control-label col-md-2 col-sm-2 col-xs-12')) }}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="checkbox">
                            <input name="set_hover" type="checkbox" value="1" class="flat" id="set_hover" <?php echo $sethover; ?>> 
                          </div>
                        </div>
                        @if ($errors->has('set_hover'))
                         <div class="alert">{{ $errors->first('set_hover') }}</div>
                        @endif
                      </div>
                      
                      {{-- image --}}
                      <div class="item form-group">
                        {{ Form::label('image', 'Image *', array('class'=>'control-label col-md-2 col-sm-2 col-xs-12')) }}
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <div class="image-editor" style="width: 100%;float: left;overflow: hidden;">
                            <div class="cropit-preview" @if($page=='edit_product_image') style="background-image:url({{ asset('uploads/products') }}/{{ $product_image->image }})" @endif></div>
                            
                            <small>&nbsp; &nbsp;Upload image minimum 370x495</small><br /><br /><br />
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
<script language="javascript" type="text/javascript" src="{{ asset('attachments/admin_assets/layout_assets/vendors/iCheck/icheck.min.js') }}" defer></script>
@if($page=='edit_category_form')
<script language="javascript" type="text/javascript" src="{{ asset('attachments/admin_assets/filecrop_assets/js/edit_image.js') }}" defer></script>
@endif
@endpush