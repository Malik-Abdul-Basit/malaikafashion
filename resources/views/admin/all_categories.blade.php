@extends('admin.layout.master')
@push('additional_header_files')
  
@endpush

@section('content')
        {{-- start page content --}}
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left doctor_page">
                <h3>Categories</h3>
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
                    <h2>All Categories</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                      <li><a href="{{route('add_category')}}" class="add-link"><i class="fa fa-plus"></i></a></li>
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
                          <th>Position</th>
                          <th>Image</th>
                          <th>Status</th>
                          <th>Buttons</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse($categories as $index => $category)
                          <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{ $category->heading }}</td>
                            <td>{{ $category->position }}</td>
                            <td>
                              <?php
                                if(!empty($category->image) && file_exists('uploads/categories/'.$category->image)===true){
                                  ?><img width="50px" src="{{ asset('uploads/categories') }}/{{ $category->image }}"><?php
                                }
                                else{
                                  ?><img width="50px" src="{{ asset('uploads/categories/default/cat-sd1_4kio.90s8asf017ka.jpg') }}"><?php
                                }
                              ?>
                            </td>
                            <td><?php if($category->status=='a'){echo 'Active';$up='d';}else{echo 'Deactive';$up='a';} ?></td>
                            <td>
                              <a href="{{ route('update_category', [$category->id,$up]) }}" class="btn btn-success btn-xs">
                                <i class="fa fa-undo"></i>
                                <?php if($category->status=='a'){echo 'Deactive';}else{echo 'Active';} ?>
                              </a>
                              <a href="{{ route('edit_category', [$category->id]) }}" class="btn btn-primary btn-xs">
                                <i class="fa fa-pencil"></i> Edit
                              </a>
                              <a href="{{ route('dell_category', [$category->id]) }}" 
                              class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete?');">
                                <i class="fa fa-trash"></i> Delete
                              </a>
                            </td>
                          </tr>
                        @empty
                          <tr>
                            <td colspan="6" class="text-center">No Record Found</td>
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