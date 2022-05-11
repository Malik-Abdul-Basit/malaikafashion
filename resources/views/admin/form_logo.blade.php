@extends('admin.layout.master')
@push('additional_header_files')
  
@endpush

@section('content')
        {{-- start page content --}}
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Add Logo</h3>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Add A Logo</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    {{ Form::open(array('url'=>'admin/logo-add','class'=>'form-horizontal form-label-left','enctype'=>'multipart/form-data')) }}
                      <div class="form-group">
                        <div class="logo-form-error">
                          @if ($errors->has('image'))
                           <p>{{ $errors->first('image') }}</p>
                          @endif
                        </div>
                        {{ Form::label('logo', 'Logo Upload', array('class'=>'control-label col-lg-4 col-md-4 col-sm-3 col-xs-2')) }}
                        <div class="col-lg-8 col-md-8 col-sm-9 col-xs-10">
                          <div class="fileupload fileupload-new" data-provides="fileupload">
                            <div class="fileupload-preview thumbnail" style="width: 200px; height: 150px;"></div>
                            <div>
                              <span class="btn btn-file btn-info">
                                <span class="fileupload-new">Select image</span>
                                <span class="fileupload-exists">Change</span>
                                {{ Form::file('image',array('id'=>'logo-image','accept'=>'image/*')) }}
                              </span>
                              <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                              <button id="send" type="submit" class="btn btn-success">Upload</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
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
  
@endpush