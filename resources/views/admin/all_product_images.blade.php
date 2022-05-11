@extends('admin.layout.master')
@push('additional_header_files')
  
@endpush

@section('content')
        {{-- start page content --}}
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left doctor_page">
                <h3>Product Images</h3>
                <div class="outter_error">
                  @if(Session::has('error'))
                    <div class="alert alert-{{Session::get('alert_class')}} alert-dismissible fade in" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                      {{Session::get('error')}}
                    </div>
                  @endif
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>All Product Images</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                      <li><a href="{{route('add_product_image')}}" class="add-link"><i class="fa fa-plus"></i></a></li>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content overflow-show">
                    <table id="datatable" class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Sr. No</th>
                          <th>Image</th>
                          
                          <th>Main Image</th>
                          <th>Hover Image</th>
                          
                          <th>Product Name</th>
                          <th>Status</th>
                          
                          <th>Buttons</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse($product_images as $index => $ProductImage)
                          <tr>
                            <td>{{ $index+1 }}</td>
                            <td style="position:relative">
                              @if(!empty($ProductImage->image) && file_exists('uploads/products/'.$ProductImage->image)===true)
                                <a class="show-hover-img">
                                  <img src="{{ asset('uploads/products').'/'.$ProductImage->image }}" width="50px" height="auto">
                                  <img src="{{ asset('uploads/products').'/'.$ProductImage->image }}" class="hover-image">
                                </a>
                              @else
                                <img src="{{ asset('uploads/products/default/pro-sd1_4kio.90s8asf017ka.jpg') }}" width="50px" height="auto">
                              @endif
                            </td>
                            
                            <td>@if($ProductImage->set_main==1) Main @endif </td>
                            <td>@if($ProductImage->set_hover==1) Hover @endif </td>
                            
                            <td>
							  <?php
                                $product = DB::table('products')->where('id', $ProductImage->product_id)->limit(1)->first();
                                if(!empty($product)){
                                  echo $product->heading;
                                }
                                else{
                                  echo 'Product '.$ProductImage->product_id.' deleted';
								}
                              ?>
                            </td>
                            
                            <td><?php if($ProductImage->status=='a'){echo 'Active';$up='d';}else{echo 'Deactive';$up='a';} ?></td>
                            <td>
                              <a href="{{ route('update_productimage', [$ProductImage->id,$up]) }}" class="btn btn-success btn-xs">
                                <i class="fa fa-undo"></i>
                                @if($ProductImage->status=='a') Deactive @else Active @endif
                              </a>
                              <a href="{{ route('set_main', [$ProductImage->id]) }}" class="btn btn-info btn-xs">
                                <i class="fa fa-image"></i>
                                Set Main
                              </a>
                              <a href="{{ route('set_hover', [$ProductImage->id]) }}" class="btn btn-warning btn-xs">
                                <i class="fa fa-image"></i>
                                Set Hover
                              </a>
                              <a href="{{ route('edit_product_image', [$ProductImage->id]) }}" class="btn btn-primary btn-xs">
                                <i class="fa fa-pencil"></i> Edit
                              </a>
                              <a href="{{ route('dell_product_image', [$ProductImage->id]) }}" 
                              class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete?');">
                                <i class="fa fa-trash"></i> Delete
                              </a>
                            </td>
                          </tr>
                        @empty
                          <tr>
                            <td colspan="7" class="text-center">No Record Found</td>
                          </tr>
                        @endforelse
                      </tbody>
                    </table>
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