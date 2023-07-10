@extends('layouts.master')
@section('css')
@section('title')
  قائمه الغرف -الوافي 
@stop
@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">قائمه</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ الغرف</span>
						</div>
					</div>
				
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				
				  <div class="row">
				   @if (session()->has('Add'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>{{ session()->get('Add') }}</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
                  </div>
                      @endif

				 @if ($errors->any())
                    <div class="alert alert-danger">
                     <ul>
                     @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                          </ul>
                         </div>
                  @endif
                  @if (session()->has('edit'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session()->get('edit') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>   </div>
                   @endif
                   
@if (session()->has('delete'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{ session()->get('delete') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

		<div class="col-xl-12">
		    <div class="card mg-b-20">
               <div class="card-header pb-0">
               @can('اضافه غرف')   
                 <a class="slide-item" href="showDetelshotel/create"  >
                 <i class="fas fa-plus"></i>&nbsp; اضافة غرف</a>
               @endcan  			
               </div>
						
							<div class="card-body">
								<div class="table-responsive">
									<table id="example1" class="table key-buttons text-md-nowrap">
										<thead>
											<tr>
                                            <th class="border-bottom-0">#</th>
												<th class="border-bottom-0">رقم الغرفه </th>
												<th class="border-bottom-0">الطابق</th>
												<th class="border-bottom-0">عدد الغرف</th>
												<th class="border-bottom-0">عدد الاسره</th>
												<th class="border-bottom-0"> صور الغرف</th>
												<th class="border-bottom-0">تابع غرفه</th>
                                                <th class="border-bottom-0">العمليات</th>
											</tr>
										</thead>
										<tbody>
                                <?php $i = 0; ?>
                                @foreach ($showDetelshotel as $addhotel)
                                    <?php $i++; ?>
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $addhotel->numRoom }}</td>
                                        <td>{{ $addhotel->floor }}</td>
                                        <td>{{ $addhotel->numofroom }}</td>
										<td>{{ $addhotel->numFmaily }}</td>
                                        <td><img src="{{ asset('storage/images/' . $addhotel->imgroomone) }}" alt="hotel image" width="100" height="80"></td>
                                        <td>{{ $addhotel->contentHotel }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button aria-expanded="false" aria-haspopup="true"
                                                    class="btn ripple btn-primary btn-sm" data-toggle="dropdown"
                                                    type="button">العمليات<i class="fas fa-caret-down ml-1"></i></button>
                                                <div class="dropdown-menu tx-13">
                                                @can('تعديل الغرف')
                                                        <a class="dropdown-item"
                                                            href=" {{ url('updates') }}/{{ $addhotel->id }}">تعديل
                                                            الغرف</a>
                                                @endcan   

                                                    <a  data-effect="effect-scale"
                                            data-id="{{ $addhotel->id }}" data-numRoom="{{ $addhotel->numRoom }}"
                                                data-floor="{{ $addhotel->floor }}"data-numofroom="{{ $addhotel->numofroom }}"
                                                data-numFmaily="{{ $addhotel->numFmaily }}"data-image="{{ asset('images/hotels/' . $addhotel->imgroomone)  }}"
                                                data-contentHotel="{{ $addhotel->contentHotel }}"data-typeroom="{{ $addhotel->typeroom }}"
                                                data-avalibaleroom="{{ $addhotel->avalibaleroom }}"  data-price="{{ $addhotel->price }}" 
                                                data-category="{{ $addhotel->category }}"  data-toggle="modal"
                                                 href="#modaldemo9" title="حذف">
                                            @can('حذف الغرف')    
                                                 <i class="las la-trash">حذف الغرف</i></a>
                                            @endcan    

                
                                                </div>
                                            </div>

                                        </td>
                                       
                                       
                                    </tr>
                                @endforeach
                            </tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					
		</div>
				</div>
				<!-- row closed -->
			</div>
          
        
    </div>
    <div class="modal" id="modaldemo9">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">حذف تفاصيل الغرف</h6><button aria-label="Close" class="close" data-dismiss="modal"
                        type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="showDetelshotel/destroy" method="post">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                        <input type="hidden" name="id" id="id" value="">
                        <input class="form-control" name="numRoom " id="numRoom " type="text" readonly>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                        <button type="submit" class="btn btn-danger">تاكيد</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<!-- Internal Data tables -->
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>
<script src="{{URL::asset('assets/js/modal.js')}}"></script>
<script>
    $('#exampleModal2').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var numRoom = button.data('numRoom')
        var floor = button.data('floor')
        var floor = button.data('price')
        var numofroom = button.data('numofroom')
        var numFmaily = button.data('numFmaily')
        var contentHotel = button.data('contentHotel')
        var avalibaleroom = button.data('avalibaleroom')
        var category = button.data('category')
        var typeroom = button.data('phoenumber')
        var image = button.data('asset(image)')
        var modal = $(this)

        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #numRoom').val(numRoom);
        modal.find('.modal-body #floor').val(floor);
        modal.find('.modal-body #price').val(price);
        modal.find('.modal-body #numofroom').val(numofroom);
        modal.find('.modal-body #numFmaily').val(numFmaily);
        modal.find('.modal-body #contentHotel').val(contentHotel);
        modal.find('.modal-body #avalibaleroom').val(avalibaleroom);
        modal.find('.modal-body #category').val(category);
        modal.find('.modal-body #typeroom').val(typeroom);
        modal.find('.modal-body #image').val(image);
    })

</script>
<script>
    $('#modaldemo9').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var numRoom = button.data('numRoom')
        var floor = button.data('floor')
        var floor = button.data('price')
        var numofroom = button.data('numofroom')
        var numFmaily = button.data('numFmaily')
        var contentHotel = button.data('contentHotel')
        var avalibaleroom = button.data('avalibaleroom')
        var category = button.data('category')
        var typeroom = button.data('phoenumber')
        var image = button.data('asset(image)')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #numRoom').val(numRoom);
        modal.find('.modal-body #floor').val(floor);
        modal.find('.modal-body #numofroom').val(numofroom);
        modal.find('.modal-body #numFmaily').val(numFmaily);
        modal.find('.modal-body #contentHotel').val(contentHotel);
        modal.find('.modal-body #avalibaleroom').val(avalibaleroom);
        modal.find('.modal-body #category').val(category);
        modal.find('.modal-body #typeroom').val(typeroom);
        modal.find('.modal-body #image').val(image);
        modal.find('.modal-body #price').val(price);
    })

</script>
@endsection