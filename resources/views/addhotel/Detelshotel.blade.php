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
    اضافة فنادق
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الفنادق</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    اضافة الغرف</span>
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
                    <form action="{{ route('showDetelshotel.store') }}" method="post" enctype="multipart/form-data"
                        autocomplete="off">
                        {{ csrf_field() }}
                        {{-- 1 --}}
                               <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">رقم الغرفه</label>
                                <input type="number" class="form-control" id="inputName" name="numRoom"
                                    title="يرجي ادخال  رقم الغرفه" required>
                            </div>

                            
                            <div class="col">
                                <label for="inputName" class="control-label">الطابق </label>
                                <input type="number" class="form-control" id="inputName" name="floor"
                                    title="يرجي ادخال موقع الفندق" required>
                            </div>


                        </div>

                        {{-- 2 --}}
                        <div class="row">
                        <div class="col">
                                <label for="inputName" class="control-label">عدد الغرف</label>
                                <input type="number" class="form-control" id="inputName" name="numofroom"
                                    title="يرجي ادخال رقم هاتف الفندق" required>
                            </div>
                            <div class="col">
                                <label for="inputName" class="control-label">عدد الاسره</label>
                                <input type="number" class="form-control" id="inputName" name="numFmaily"
                                    title="يرجي ادخال رقم هاتف الفندق" required>
                            </div>
                            
                        </div>
                        {{-- 3 --}}
                        <div class="row">
                        <div class="col">
                                <label for="inputName" class="control-label">توع الغرف</label>
                                <input type="text" class="form-control" id="typeroom" name="typeroom"
                                    title="يرجي ادخال رقم هاتف الفندق" required>
                            </div>
                            <div class="col">
                                <label for="inputName" class="control-label">التقييم</label>
                                <input type="number" class="form-control" id="catgory" name="catgory"
                                    title="يرجي ادخال رقم هاتف الفندق" required>
                            </div>
                            
                        </div>
                        {{-- 4 --}}
                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">الفنادق</label>
                                <select name="contentHotel" class="form-control SlectBox" onclick="console.log($(this).val())"
                                    onchange="console.log('change is firing')">
                                    <!--placeholder-->
                                    <option value="" selected disabled>حدد تابع فندق</option>
                                    @foreach ($showDetelshotel as $addhotel)
                                        <option value="{{ $addhotel->id }}"> {{ $addhotel->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="col">
                                <label for="inputName" class="control-label">السعر </label>
                                <input type="number" class="form-control" id="inputName" name="price"
                                    title="يرجي ادخال موقع الفندق" required>
                            </div>
                          
                        </div>    
                        

                        <p class="text-danger">* صيغة الصور  jpeg ,.jpg , png </p>
                        <div class="form-group">
                   <label for="image">صورة الغرف</label>
                   <input type="file" name="imgroomone" class="form-control">
                   <input type="file" name="imgroomtow" class="form-control">
                   <input type="file" name="imgroomthree" class="form-control">
                   <input type="file" name="imgroomfour" class="form-control">
                           </div>
                            <<br>

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

