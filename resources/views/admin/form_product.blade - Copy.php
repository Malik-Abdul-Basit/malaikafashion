@extends('admin.layout.master')
@push('additional_header_files')
    <link href="{{ asset('attachments/admin_assets/layout_assets/vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">
@endpush

@section('content')
        {{-- start page content --}}
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>
                  <?php
                    if($page=='product_form'){
                      $heading = 'Add Product';
                      $xheading = 'Add Product Info';
                      $action = 'admin/product-add';
                    }
                    else{
                      $heading = 'Edit Product';
                      $xheading = 'Edit Product Info';
                      $action = 'admin/product-edit/'.$product->id;
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
                            if($page=='edit_product_form'){ $cat_selected = $product->category_id; }
                            else{ $cat_selected = '0'; }
                            $AllCategories=array();
                            if(count($categories)>0){
                              foreach($categories as $index => $category){
                                $AllCategories[$category->id]=$category->heading;
                              }
                            }
                            
                            echo Form::select(
                              'category_id',
                              array($AllCategories),
                              $cat_selected,
                              array('id'=>'category_id','class'=>'form-control col-md-8 col-sm-8 col-xs-12','required'=>'required')
                            );
                          ?>
                        </div>
                        @if ($errors->has('category_id'))
                         <div class="alert">{{ $errors->first('category_id') }}</div>
                        @endif
                      </div>
                      
                      {{-- heading --}}
                      <div class="item form-group">
                        {{ Form::label('heading', 'Heading *', array('class'=>'control-label col-md-2 col-sm-2 col-xs-12')) }}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          @if($page=='edit_product_form')
                          <input type="text" name="heading" value="{{ old('heading', $product->heading) }}" id="heading" class="form-control col-md-8 col-sm-8 col-xs-12" required="required">
                          @else
                          {{ Form::text('heading',old("heading"), array('id'=>'heading','class'=>'form-control col-md-8 col-sm-8 col-xs-12','required'=>'required')) }}
                          @endif
                        </div>
                        @if ($errors->has('heading'))
                         <div class="alert">{{ $errors->first('heading') }}</div>
                        @endif
                      </div>
                      
                      {{-- actule_price --}}
                      <div class="item form-group">
                        {{ Form::label('actule_price', 'Actule Price *', array('class'=>'control-label col-md-2 col-sm-2 col-xs-12')) }}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          @if($page=='edit_product_form')
                          <input type="text" name="actule_price" value="{{ old('actule_price', $product->actule_price) }}" id="actule_price" class="form-control col-md-8 col-sm-8 col-xs-12" required="required">
                          @else
                          {{ Form::number('actule_price',old("actule_price"), array('id'=>'actule_price','class'=>'form-control col-md-8 col-sm-8 col-xs-12','required'=>'required')) }}
                          @endif
                        </div>
                        @if ($errors->has('actule_price'))
                         <div class="alert">{{ $errors->first('actule_price') }}</div>
                        @endif
                      </div>
                      
                      {{-- sale_price --}}
                      <div class="item form-group">
                        {{ Form::label('sale_price', 'Sale Price *', array('class'=>'control-label col-md-2 col-sm-2 col-xs-12')) }}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          @if($page=='edit_product_form')
                          <input type="text" name="sale_price" value="{{ old('sale_price', $product->sale_price) }}" id="sale_price" class="form-control col-md-8 col-sm-8 col-xs-12" required="required">
                          @else
                          {{ Form::number('sale_price',old("sale_price"), array('id'=>'sale_price','class'=>'form-control col-md-8 col-sm-8 col-xs-12','required'=>'required')) }}
                          @endif
                        </div>
                        @if ($errors->has('sale_price'))
                         <div class="alert">{{ $errors->first('sale_price') }}</div>
                        @endif
                      </div>
                      
                      {{-- star_rating --}}
                      <div class="item form-group">
                        {{ Form::label('star_rating', 'Star Rating *', array('class'=>'control-label col-md-2 col-sm-2 col-xs-12')) }}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          @if($page=='edit_product_form')
                          <input type="text" name="star_rating" value="{{ old('star_rating', $product->star_rating) }}" id="star_rating" class="form-control col-md-8 col-sm-8 col-xs-12" required="required">
                          @else
                          {{ Form::number('star_rating',old("star_rating"), array('id'=>'star_rating','class'=>'form-control col-md-8 col-sm-8 col-xs-12','min'=>'0','max'=>'5','required'=>'required')) }}
                          @endif
                        </div>
                        @if ($errors->has('star_rating'))
                         <div class="alert">{{ $errors->first('star_rating') }}</div>
                        @endif
                      </div>
                      
                      {{-- description --}}
                      <div class="item form-group">
                        {{ Form::label('description', 'Description *', array('class'=>'control-label col-md-2 col-sm-2 col-xs-12')) }}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          @if($page=='edit_product_form')
                          {{ Form::textarea('description',$product->description, array('id'=>'description','class'=>'form-control col-md-8 col-sm-8 col-xs-12','required'=>'required','cols'=>'50','rows'=>'5')) }}
                          @else
                          {{ Form::textarea('description',old("description"), array('id'=>'description','class'=>'form-control col-md-8 col-sm-8 col-xs-12','required'=>'required','cols'=>'50','rows'=>'5')) }}
                          @endif
                        </div>
                        @if ($errors->has('description'))
                         <div class="alert">{{ $errors->first('description') }}</div>
                        @endif
                      </div>
                      
                      {{-- sale --}}
                      <div class="item form-group">
                        {{ Form::label('sale', 'Sale', array('class'=>'control-label col-md-2 col-sm-2 col-xs-12')) }}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php 
                            if($page=='edit_product_form'){
                              if($product->sale=='y'){ $checked = 'checked="checked"'; }
                              else{ $checked = ''; }
                            }
                            else{ $checked = ''; }
                          ?>
                          
                          <div class="checkbox">
                            <input name="sale" type="checkbox" value="y" class="flat" id="sale" <?php echo $checked; ?>> 
                          </div>
                        </div>
                        @if ($errors->has('sale'))
                         <div class="alert">{{ $errors->first('sale') }}</div>
                        @endif
                      </div>
                      
                      {{-- special_offer --}}
                      <div class="item form-group">
                        {{ Form::label('special_offer', 'Special Offer', array('class'=>'control-label col-md-2 col-sm-2 col-xs-12')) }}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php 
                            if($page=='edit_product_form'){
                              if($product->special_offer=='y'){ $check = 'checked="checked"'; }
                              else{ $check = ''; }
                            }
                            else{ $check = ''; }
                          ?>
                          
                          <div class="checkbox">
                            <input name="special_offer" type="checkbox" value="y" class="flat" id="special_offer" <?php echo $check; ?>> 
                          </div>
                        </div>
                        @if ($errors->has('special_offer'))
                         <div class="alert">{{ $errors->first('special_offer') }}</div>
                        @endif
                      </div>
                      
                      {{-- price_display --}}
                      <div class="item form-group">
                        {{ Form::label('price_display', 'Price Display', array('class'=>'control-label col-md-2 col-sm-2 col-xs-12')) }}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php 
                            if($page=='edit_product_form'){
                              if($product->price_display=='d'){ $display = 'checked="checked"'; }
                              else{ $display = ''; }
                            }
                            else{ $display = ''; }
                          ?>
                          
                          <div class="checkbox">
                            <input name="price_display" type="checkbox" value="d" class="flat" id="price_display" <?php echo $display; ?>> 
                          </div>
                        </div>
                        @if ($errors->has('price_display'))
                         <div class="alert">{{ $errors->first('price_display') }}</div>
                        @endif
                      </div>
                      
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button id="send" type="submit" class="btn btn-success export">Submit</button>
                        </div>
                      </div>
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
<script language="javascript" type="text/javascript" src="{{ asset('attachments/admin_assets/layout_assets/vendors/iCheck/icheck.min.js') }}" defer></script>
@endpush