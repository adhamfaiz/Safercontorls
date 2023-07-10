
@extends('layouts.master')
@section('css')
@section('title')
  اماكن رائجه -سافر 
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
							<h4 class="content-title mb-0 my-auto">اماكن</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ رائجه</span>
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
        </button>
    </div>
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
								<div class="d-flex justify-content-between">
								<a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale" data-toggle="modal" href="#modaldemo8">اضافه اماكن رائجه</a>
								
								</div>
								
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="example1" class="table key-buttons text-md-nowrap">
										<thead>
											<tr>
                                                <th class="border-bottom-0">#</th>
											    <th class="border-bottom-0">أسم المكان </th>
												<th class="border-bottom-0">الموقع</th>
												<th class="border-bottom-0">النوع</th>
												<th class="border-bottom-0">الوصف</th>
												<th class="border-bottom-0">صوره المكان </th>
											</tr>
										</thead>
										<tbody>
                                <?php $i = 0; ?>
                                @foreach ($Popular as $addhotel)
                                    <?php $i++; ?>
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $addhotel->name_TouristPlaces }}</td>
                                        <td>{{ $addhotel->address }}</td>
                                        <td>{{ $addhotel->types }}</td>
										<td>{{ $addhotel->description }}</td>
										
                                        <td><img src="{{ asset('storage/images/' . $addhotel->image) }}" alt="hotel image" width="100" height="80"></td>
                                        
                                        <td>
                                       
                                            <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                data-id="{{ $addhotel->id }}" data-name_TouristPlaces="{{ $addhotel->name_TouristPlaces }}"
                                                data-address="{{ $addhotel->address }}"data-types="{{ $addhotel->types }}"
                                                 data-image="{{ asset($addhotel->image) }}s"
                                                data-description="{{ $addhotel->description }}" data-toggle="modal"
                                                href="#exampleModal2" title="تعديل"><i class="las la-pen"></i></a>
                                       

                                       
                                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                            data-id="{{ $addhotel->id }}" data-name_TouristPlaces="{{ $addhotel->name_TouristPlaces }}"
                                                data-address="{{ $addhotel->address }}"data-types="{{ $addhotel->types }}"
                                                data-image="{{ asset($addhotel->image) }}s"
                                                data-description="{{ $addhotel->description }}" data-toggle="modal"
                                                 href="#modaldemo9" title="حذف"><i
                                                    class="las la-trash"></i></a>
                                      
                                    </td>
                                       
                                    </tr>
                                @endforeach
                            </tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="modal" id="modaldemo8">
			<div class="modal-dialog" role="document">
				<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title">اضافه مكان رائج</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">
                    <form action="{{ route('Popular.store') }}" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}
                   
                        <div class="form-group">
                            <label for="exampleInputEmail1">اسم المكان</label>
                            <input type="text" class="form-control" id="name_TouristPlaces" name="name_TouristPlaces">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">الموقع</label>
                            <input type="text" class="form-control" id="address" name="address">
                        </div>
                        
						<div class="form-group">
                                <label for="inputName" class="control-label">النوع</label>
                                <input type="text" class="form-control" id="types" name="types" readonly
                                    value="رائج">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">وصف المكان</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                         <label for="image">صور المكان</label>
                         <input type="file" class="form-control" name="image" id="image">
                        </div>


						

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">تاكيد</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                        </div>
                    </form>
                </div>
				</div>
			</div>
		</div>
				</div>
				<!-- row closed -->
			</div>
            <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">تعديل الاماكن الرئجه</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="Popular/update" method="post" autocomplete="off">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="hidden" name="id" id="id" value="">
                            <label for="recipient-name" class="col-form-label">اسم المكان الرئج:</label>
                            <input class="form-control" name="name_TouristPlaces" id="name_TouristPlaces" type="text">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">الموقع</label>
                            <input type="text" class="form-control" id="address" name="address">
                        </div>

						<div class="form-group">
                                <label for="inputName" class="control-label">النوع</label>
                                <input type="text" class="form-control" id="types" name="types" readonly
                                    value="رائج">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">وصف المكان الرئج</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                         <label for="image">صور المكان</label>
                         <input type="file" class="form-control" name="image" id="image">
                        </div>


						
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">تاكيد</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal" id="modaldemo9">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">حذف المكان الرئج</h6><button aria-label="Close" class="close" data-dismiss="modal"
                        type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="Popular/destroy" method="post">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                        <input type="hidden" name="id" id="id" value="">
                        <input class="form-control" name="name_TouristPlaces" id="name_TouristPlaces" type="text" readonly>
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
        var name_TouristPlaces = button.data('name_TouristPlaces')
        var description = button.data('description')
        var address = button.data('address')
        var types = button.data('types')
        var image = button.data('asset(image)')
        var modal = $(this)

        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #name_TouristPlaces').val(name_TouristPlaces);
        modal.find('.modal-body #description').val(description);
        modal.find('.modal-body #types').val(types);
        modal.find('.modal-body #address').val(address);
        modal.find('.modal-body #image').val(image);
    })

</script>
<script>
    $('#modaldemo9').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var name_TouristPlaces = button.data('name_TouristPlaces')
        var description = button.data('description')
        var address = button.data('address')
        var types = button.data('types')
        var image = button.data('asset(image)')
        var modal = $(this)

        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #name_TouristPlaces').val(name_TouristPlaces);
        modal.find('.modal-body #description').val(description);
        modal.find('.modal-body #types').val(types);
        modal.find('.modal-body #address').val(address);
        modal.find('.modal-body #image').val(image);
    })

</script>
@endsection