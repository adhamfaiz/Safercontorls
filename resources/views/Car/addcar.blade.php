@extends('layouts.master')
@section('css')
    <!--- Internal Select2 css-->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!---Internal Fileupload css-->
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    <!---Internal Fancy uploader css-->
    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
    <!--Internal Sumoselect css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css') }}">
    <!--Internal  TelephoneInput css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">
@endsection
@section('title')
    اضافة تفاصيل السيارات
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">السيارات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    اضافة </span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

    @if (session()->has('Add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Add') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- row -->
    <div class="row">

        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('Cars_mod.store') }}" method="post" enctype="multipart/form-data"
                        autocomplete="off">
                        {{ csrf_field() }}
                        {{-- 1 --}}

                        <div class="row">
                        <div class="col">
                            <label for="exampleInputEmail1">اسم الشركه</label>
                            <input type="text" class="form-control" id="name_car" name="name_car">
                        </div>


						<div class="col">
                            <label for="exampleInputEmail1">موديل السياره</label>
                            <input type="text" class="form-control" id="Car_Model" name="Car_Model">
                        </div>

                           

                        </div>

                        {{-- 2 --}}
                        <div class="row">
                        
                        <div class="col">
                            <label for="exampleFormControlTextarea1">سنه الصنع</label>
                            <input type="number" class="form-control" id="MAnfacturing_year" name="MAnfacturing_year">
                        </div>

                        <div class="col">
                         <label for="image">عدد الابواب</label>
                         <input type="number" class="form-control" name="num_doors" id="num_doors">
                        </div>
                        </div>
                        {{-- 2 --}}
                        <div class="row">
                        <div class="col">
                            <label for="exampleInputEmail1">ناقل الحركه</label>
                            <input type="text" class="form-control" id="Motion_vector" name="Motion_vector">
                        </div>
                        <div class="col">
                            <label for="exampleInputEmail1">التقييم</label>
                            <input type="text" class="form-control" id="catgory" name="catgory">
                        </div>
                     </div>
                     {{-- 2 --}}
                        <div class="row">
                        <div class="col">
                            <label for="exampleInputEmail1"> مقاعد</label>
                            <input type="text" class="form-control" id="drap" name="drap">
                        </div>
						<div class="col">
                            <label for="exampleInputEmail1">الامتعه</label>
                            <input type="text" class="form-control" id="luggage" name="luggage">
                        </div>
                     </div>
                     {{-- 2 --}}
                        <div class="row">
                        <div class="col">
                            <label for="exampleInputEmail1">السعر لليوم</label>
                            <input type="number" class="form-control" id="price_day" name="price_day">
                        </div>
                        <div class="col">
                   <label for="image">صورة الغرف</label>
                   <input type="file" name="image" class="form-control">
                   <input type="file" name="imgroomtow" class="form-control">
                   <input type="file" name="imgroomthree" class="form-control">
                   <input type="file" name="imgroomfour" class="form-control">
                           </div>
        
                        </div>
                        {{-- 2 --}}
                       <br>
                       <div class="col">
                                <label for="inputName" class="control-label">السياره</label>
                                <select name="contentcomp" class="form-control SlectBox" onclick="console.log($(this).val())"
                                    onchange="console.log('change is firing')">
                                    <!--placeholder-->
                                    <option value="" selected disabled>حدد السياره</option>
                                    @foreach ($car as $addhotel)
                                        <option value="{{ $addhotel->id }}"> {{ $addhotel->name_car }}</option>
                                    @endforeach
                                </select>
                                <div class="col">
                            <label for="exampleInputEmail1">حجزالسياره</label>
                            <input type="text" class="form-control" id="years" name="years">
                        </div>
                      </div>
                          
                            <br>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">حفظ البيانات</button>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>

    </div>

    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!--Internal Fileuploads js-->
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
    <!--Internal Fancy uploader js-->
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
    <!--Internal  Form-elements js-->
    <script src="{{ URL::asset('assets/js/advanced-form-elements.js') }}"></script>
    <script src="{{ URL::asset('assets/js/select2.js') }}"></script>
    <!--Internal Sumoselect js-->
    <script src="{{ URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
    <!-- Internal form-elements js -->
    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>
@endsection

