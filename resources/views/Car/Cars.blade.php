
@extends('layouts.master')
@section('css')
@section('title')
 اضافه  السيارات -الوافي 
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
							<h4 class="content-title mb-0 my-auto">اضافه</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ فنادق</span>
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
           @can('اضافه سيارات')    
                 <a class="slide-item" href="Cars_mod/create"  >
                 <i class="fas fa-plus"></i>&nbsp; اضافة السيارات</a>
           @endcan      
								</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="example1" class="table key-buttons text-md-nowrap">
										<thead>
											<tr>
                                                <th class="border-bottom-0">#</th>
											    <th class="border-bottom-0">أسم  السياره</th>
                                                <th class="border-bottom-0">السعر</th>
												<th class="border-bottom-0">الموديل</th>
                                                <th class="border-bottom-0">مقاعد</th>
												<th class="border-bottom-0">تابع شركه</th>
												<th class="border-bottom-0"> التقييم</th>
												<th class="border-bottom-0">صور السياره</th>
                                                <th class="border-bottom-0">العمليات</th>
											</tr>
										</thead>
										<tbody>
                                <?php $i = 0; ?>
                                @foreach ($Cars_mod as $addhotel)
                                    <?php $i++; ?>
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $addhotel->name_car }}</td>
                                        <td>{{ $addhotel->price_day }}</td>
                                        <td>{{ $addhotel->years }}</td>
										<td>{{ $addhotel->drap }}</td>
										<td>{{ $addhotel->contentcomp }}</td>
                                        <td>{{ $addhotel->catgory }}</td>
                                        <td><img src="{{ asset('storage/images/' . $addhotel->image) }}" alt="hotel image" width="100" height="80"></td>
                                        
                                        <td>
                                       
                                            <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                data-id="{{ $addhotel->id }}" data-name_car="{{ $addhotel->name_car }}"
                                                data-price="{{ $addhotel->price }}"data-drap="{{ $addhotel->drap }}"
                                                data-catgory="{{ $addhotel->catgory }}"data-image="{{ asset($addhotel->image) }}s"
                                                data-years="{{ $addhotel->years }}" data-toggle="modal"
                                                href="#exampleModal2" title="تعديل"><i class="las la-pen"></i></a>
                                       

                                       
                                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                            data-id="{{ $addhotel->id }}" data-name_car="{{ $addhotel->name_car }}"
                                                data-price="{{ $addhotel->price }}"data-drap="{{ $addhotel->drap }}"
                                                data-catgory="{{ $addhotel->catgory }}"data-image="{{ asset($addhotel->image) }}s"
                                                data-years="{{ $addhotel->years }}"  data-toggle="modal"
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
						<h6 class="modal-title">اضافه سياره</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">
                    <form action="{{ route('Cars_mod.store') }}" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}
                   
                        <div class="form-group">
                            <label for="exampleInputEmail1">اسم السياره</label>
                            <input type="text" class="form-control" id="name_car" name="name_car">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">الموديل</label>
                            <input type="text" class="form-control" id="years" name="years">
                        </div>
                        <div class="form-group">
                                <label for="inputName" class="control-label">الشركه</label>
                                <select name="contentcomp" class="form-control SlectBox" onclick="console.log($(this).val())"
                                    onchange="console.log('change is firing')">
                                    <!--placeholder-->
                                    <option value="" selected disabled>حدد الشركه</option>
                                    @foreach ($cars as $addhotel)
                                        <option value="{{ $addhotel->id }}"> {{ $addhotel->typeroom }}</option>
                                    @endforeach
                                </select>
                            </div>
             

						<div class="form-group">
                            <label for="exampleInputEmail1"> السعر</label>
                            <input type="number" class="form-control" id="price" name="price">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"> التقيم</label>
                            <input type="number" class="form-control" id="catgory" name="catgory">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"> مقاعد</label>
                            <input type="number" class="form-control" id="drap" name="drap">
                        </div>

                        <div class="form-group">
                         <label for="image">صور السياره</label>
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
                    <h5 class="modal-title" id="exampleModalLabel">تعديل السيارات</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="Cars_mod/update" method="post" autocomplete="off">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="hidden" name="id" id="id" value="">
                            <label for="recipient-name" class="col-form-label">اسم السياره:</label>
                            <input class="form-control" name="name_car" id="name_car" type="text">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">السعر</label>
                            <input type="text" class="form-control" id="price" name="price">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">الموديل</label>
                            <input type="text" class="form-control" id="years" name="years">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"> مقاعد</label>
                            <input type="number" class="form-control" id="drap" name="drap">
                        </div>

						<div class="form-group">
                            <label for="exampleInputEmail1"> التقيم</label>
                            <input type="number" class="form-control" id="catgory" name="catgory">
                        </div>
                        <div class="form-group">
                                <label for="inputName" class="control-label">الشركه</label>
                                <select name="contentcomp" class="form-control SlectBox" onclick="console.log($(this).val())"
                                    onchange="console.log('change is firing')">
                                    <!--placeholder-->
                                    <option value="" selected disabled>حدد تابع الشركه</option>
                                    @foreach ($cars as $addhotel)
                                        <option value="{{ $addhotel->id }}"> {{ $addhotel->name_company }}</option>
                                    @endforeach
                                </select>
                         </div>

                      
                        <div class="form-group">
                         <label for="image">صور الشركه</label>
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
                    <h6 class="modal-title">حذف السيارات</h6><button aria-label="Close" class="close" data-dismiss="modal"
                        type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="Cars_mod/destroy" method="post">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                        <input type="hidden" name="id" id="id" value="">
                        <input class="form-control" name="name_car" id="name_car" type="text" readonly>
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
        var name_car = button.data('name_car')
        var price = button.data('price')
        var drap = button.data('drap')
        var catgory = button.data('catgory')
        var image = button.data('asset(image)')
        var years = button.data('years')
        var modal = $(this)

        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #name_car').val(name_car);
        modal.find('.modal-body #price').val(price);
        modal.find('.modal-body #drap').val(drap);
        modal.find('.modal-body #catgory').val(catgory);
        modal.find('.modal-body #image').val(image);
        modal.find('.modal-body #years').val(years);
    })

</script>
<script>
    $('#modaldemo9').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var name_car = button.data('name_car')
        var price = button.data('price')
        var drap = button.data('drap')
        var catgory = button.data('catgory')
        var image = button.data('asset(image)')
        var years = button.data('years')
        var modal = $(this)

        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #name_car').val(name_car);
        modal.find('.modal-body #price').val(price);
        modal.find('.modal-body #drap').val(drap);
        modal.find('.modal-body #catgory').val(catgory);
        modal.find('.modal-body #image').val(image);
        modal.find('.modal-body #years').val(years);
    })

</script>
@endsection