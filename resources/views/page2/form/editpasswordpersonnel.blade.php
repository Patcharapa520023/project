@extends('template.template')
@section('headcontent')
{{-- {{ dd($tables[0]) }} --}}
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>แก้ไขข้อมูลบุคลากรสถานศึกษา</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">จัดการข้อมูลผู้ใช้</a></li>
                            <li><a href="#">บุคลากรสถานศึกษา</a></li>
                            <li><a href="#"><u>แก้ไขข้อมูลบุคลากรสถานศึกษา</u></a></li>
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
<form action="{{route('editpassword_personnel_post')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
    @csrf
    <div class="card">
        <div class="card-header">
            <strong>แก้ไขรหัสผ่าน</strong>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-success btn-sm">
                <i class="fa fa-dot-circle-o"></i> ยืนยันข้อมูล
            </button>
            <button type="reset" class="btn btn-danger btn-sm">
                <i class="fa fa-ban"></i> รีเฟรช
            </button>

        </div>
        @if(session('error'))
        <div class="alert alert-success " role="alert">
           <p> {{session('error')}} </p>
        </div>
        @endif
        <div>
                <div class="d-flex justify-content-center pt-3">
                    <img src="{{ asset('images/ad3.png') }}" alt="" style="width: 250px;">
                </div>



        <div class="row">
            <div class="col-lg-6">
                <div class="card-body card-block">
                    <div class="row form-group"></div>
                        <div class="row form-group">
                            <div class="col col-md-2"><label for="email-input" class=" form-control-label">อีเมล์</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input class="form-control" type="text" value="{{ $data->email }}" name="email" readonly >
                                    @error('email')
                                    <small class="help-block form-text text-danger">{{ $message }}</small>
                                    @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-2"><label for="password-input"
                                    class=" form-control-label">แก้ไขรหัสผ่าน</label></div>
                            <div class="col-12 col-md-9">
                                <input class="form-control" type="password" value="" name="password" >
                                    @error('password')
                                    <small class="help-block form-text text-danger">{{ $message }}</small>
                                @enderror
                                </div>
                        </div>

                </div>
            </div>
            <div class="col-lg-6">
                <div class="card-body card-block">
                    <div class="row form-group">
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-2"><label for="lastname-input"
                                class=" form-control-label">ชื่อ</label></div>
                        <div class="col-12 col-md-9">
                            <input class="form-control" type="text" value="{{ $data->personnel->title.$data->personnel->name." ".$data->personnel->lastname }}" name="" readonly>
                                @error('lastname')
                                <small class="help-block form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-2"><label for="password-input"
                                class=" form-control-label">ยืนยันรหัสผ่าน</label></div>
                        <div class="col-12 col-md-9">
                            <input class="form-control" type="password" value="" name="password_confirmation" >
                                @error('password_confirmation')
                                <small class="help-block form-text text-danger">{{ $message }}</small>
                            @enderror
                            </div>
                    </div>
                </div>
            </div>
            <input type="hidden" value="{{ $data->id }}" name="id">



        </div>
    </div>
    </div>
</form>
@endsection



@section('script')

@endsection
@section('style')

@endsection
