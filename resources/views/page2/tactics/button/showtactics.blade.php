@extends('template.template')
@section('headcontent')
{{-- {{ dd($tables[0]) }} --}}
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>ดูข้อมูลผู้บริหาร</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="http://127.0.0.1:8000/admin/strategic">ยุทธศาสตร์</a></li>
                            <li><a href="#"><u>ดูข้อมูยุทธศาสตร์</u></a></li>
                            {{-- <li class="active">Data table</li> --}}
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <strong>ข้อมูลยุทธศาสตร์</strong>
        </div>

        @if(session('error'))
        <div class="alert alert-success " role="alert">
           <p> {{session('error')}} </p>
        </div>
        @endif
        <div>



        <div class="row form-group ">
                            <div class="col col-md-2"><label for="select" class=" form-control-label">ปีงบประมาณ</label>
                            </div>
                            <div class="col-12 col-md-10">
                                <select value="{{ old('title') }}" name="title" id="select"
                                    class="form-control-sm form-control">
                                    <option value="">เลือกปีงบประมาณ</option>
                                    <option value="ปี">2556/option>
                                    <option value="ปี">2561</option>
                                    <option value="ปี">2565</option>
                                </select>
                                @error('title')
                                    <small class="help-block form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group row res_c">
                            <div class="col col-md-2"><label for="name-input" class=" form-control-label">ชื่อยุทธศาสตร์</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="name-input" name="name"
                                    value="{{ old('name') }}" placeholder="กรอกชื่อ" class="form-control">
                                @error('name')
                                    <small class="help-block form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group res_cc">
                            <div class="col col-md-2"><label for="name-input[]"
                                    <option class=" form-control-label">ชื่อยุทศาสตร์</label></div></option>
                            <div class="col-12 col-md-9"><input type="text" id="name-input" name="lastname"
                                    value="{{ old('name') }}" placeholder="กรอกชื่อยุทธศาสตร์" class="form-control">
                                @error('name')
                                    <small class="help-block form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>




        </div>
    </div>
    </div>
@endsection



@section('script')

@endsection
@section('style')

@endsection
