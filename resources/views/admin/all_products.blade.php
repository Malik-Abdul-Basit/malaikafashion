@extends('admin.layout.master')
@push('additional_header_files')
  
@endpush

@section('content')
        {{-- start page content --}}
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left doctor_page">
                <h3>Products</h3>
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
                    <h2>All Products</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                      <li><a href="{{route('add_product')}}" class="add-link"><i class="fa fa-plus"></i></a></li>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable" class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Sr. No</th>
                          <th>Heading</th>
                          <th>Actule Price</th>
                          <th>Sale Price</th>
                          <th>Star Rating</th>
                          <th>Description</th>
                          <th>Sale</th>
                          <th>Special Offer</th>
                          <th>Price</th>
                          <th>Category</th>
                          <th>Status</th>
                          <th>Buttons</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse($products as $index => $product)
                          <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{ $product->heading }}</td>
                            <td>{{ $product->actule_price }}</td>
                            <td>{{ $product->sale_price }}</td>
                            <td>{{ $product->star_rating }}</td>
                            <td>
                              @if(strlen($product->description)>15) {{ substr($product->description,0,12) }}...
                              @else {{ $product->description }} @endif
                            </td>
                            <td><?php if($product->sale=='y'){echo 'Sale';}else{echo 'No Sale';} ?></td>
                            <td><?php if($product->special_offer=='y'){echo 'Yes';}else{echo 'No';} ?></td>
                            <td><?php if($product->price_display=='h'){echo 'Hidden';}else{echo 'Display';} ?></td>
                            <td>
							  <?php
                                $category = DB::table('categories')->where('id', $product->category_id)->limit(1)->first();
                                echo $category->heading;
                              ?>
                            </td>
                            <td><?php if($product->status=='a'){echo 'Active';$up='d';}else{echo 'Deactive';$up='a';} ?></td>
                            <td>
                              <a href="{{ route('update_product', [$product->id,$up]) }}" class="btn btn-warning btn-xs">
                                <i class="fa fa-image"></i>
                                Images
                              </a>
                              <a href="{{ route('update_product', [$product->id,$up]) }}" class="btn btn-success btn-xs">
                                <i class="fa fa-undo"></i>
                                <?php if($product->status=='a'){echo 'Deactive';}else{echo 'Active';} ?>
                              </a>
                              <a href="{{ route('edit_product', [$product->id]) }}" class="btn btn-primary btn-xs">
                                <i class="fa fa-pencil"></i> Edit
                              </a>
                              <a href="{{ route('dell_product', [$product->id]) }}" 
                              class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete?');">
                                <i class="fa fa-trash"></i> Delete
                              </a>
                            </td>
                          </tr>
                        @empty
                          <tr>
                            <td colspan="12" class="text-center">No Record Found</td>
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